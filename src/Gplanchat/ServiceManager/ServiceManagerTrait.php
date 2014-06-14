<?php
/**
 * This file is part of php-service-manager.
 *
 * php-service-manager is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * php-service-manager is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU Lesser General Public License
 * along with php-service-manager.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author  Grégory PLANCHAT<g.planchat@gmail.com>
 * @licence GNU Lesser General Public Licence (http://www.gnu.org/licenses/lgpl-3.0.txt)
 */

/**
 * @namespace
 */
namespace Gplanchat\ServiceManager;

use SplPriorityQueue;
use Gplanchat\ServiceManager\RuntimeException;

trait ServiceManagerTrait
{
    /**
     * @var array
     */
    protected $aliases = [];

    /**
     * @var array
     */
    protected $invokables = [];

    /**
     * @var array
     */
    protected $singletons = [];

    /**
     * @var array
     */
    protected $factories = [];

    /**
     * @var array
     */
    protected $initializers = [];

    /**
     * @var array
     */
    protected $peeringServiceManagers = [];

    /**
     * Get the service instance
     *
     * @param string $serviceName
     * @param array $constructorParams
     * @param bool $ignoreInexistent
     * @param bool $ignorePeering
     * @throws RuntimeException
     * @return mixed
     */
    public function get($serviceName, array $constructorParams = [], $ignoreInexistent = false, $ignorePeering = false)
    {
        while ($this->isAlias($serviceName)) {
            $serviceName = $this->getAlias($serviceName);
        }

        if (true === $this->isInvokable($serviceName)) {
            return $this->invoke($this->invokables[$serviceName], $constructorParams);
        }

        if (true === $this->isSingleton($serviceName)) {
            if (is_string($this->singletons[$serviceName])) {
                $this->singletons[$serviceName] = $this->invoke($this->singletons[$serviceName], $constructorParams);
            }

            return $this->singletons[$serviceName];
        }

        if (true === $this->isFactory($serviceName)) {
            return $this->invokeFactory($serviceName, $constructorParams);
        }

        if (!$ignorePeering) {
            foreach ($this->peeringServiceManagers as $serviceManager) {
                /** @var ServiceManagerInterface $serviceManager */
                $service = $serviceManager->get($serviceName, $constructorParams, $ignoreInexistent);

                if ($service !== null) {
                    return $service;
                }
            }
        }

        if (!$ignoreInexistent) {
            throw new RuntimeException(sprintf('Service "%s" was not found.', $serviceName));
        }

        return null;
    }

    /**
     * @param string $serviceName
     * @param bool $ignorePeering
     * @return mixed
     */
    public function has($serviceName, $ignorePeering = false)
    {
        while ($this->isAlias($serviceName)) {
            $serviceName = $this->getAlias($serviceName);
        }

        if (true === $this->isInvokable($serviceName)) {
            return true;
        }

        if (true === $this->isSingleton($serviceName)) {
            return true;
        }

        if (true === $this->isFactory($serviceName)) {
            return true;
        }

        return false;
    }

    /**
     * @param string $serviceName
     * @param array $constructorParams
     * @param bool $ignoreInexistent
     * @param bool $ignorePeering
     * @return mixed
     */
    public function __invoke($serviceName, array $constructorParams = [], $ignoreInexistent = false, $ignorePeering = false)
    {
        return $this->get($serviceName, $constructorParams, $ignoreInexistent);
    }

    /**
     * @param string $serviceName
     * @return bool
     */
    public function isAlias($serviceName)
    {
        if (isset($this->aliases[$serviceName])) {
            return true;
        }

        return false;
    }

    /**
     * @param string $serviceName
     * @return bool
     */
    public function isInvokable($serviceName)
    {
        if (isset($this->invokables[$serviceName])) {
            return true;
        }

        return false;
    }

    /**
     * @param string $serviceName
     * @return bool
     */
    public function isSingleton($serviceName)
    {
        if (isset($this->singletons[$serviceName])) {
            return true;
        }

        return false;
    }

    /**
     * @param string $serviceName
     * @return bool
     */
    public function isFactory($serviceName)
    {
        if (isset($this->factories[$serviceName])) {
            return true;
        }

        return false;
    }

    /**
     * @param string $serviceName
     * @param array $constructorParams
     * @return mixed
     */
    public function invoke($serviceName, array $constructorParams = [])
    {
        if (empty($constructorParams)) {
            $instance = new $serviceName;
        } else {
            $re = new \ReflectionClass($serviceName);
            $instance = $re->newInstanceArgs($constructorParams);
        }

        foreach ($this->initializers as $initializer) {
            $initializer($instance, $this);
        }

        return $instance;
    }

    /**
     * @param string $serviceName
     * @param array $extraParams
     * @return mixed
     */
    public function invokeFactory($serviceName, array $extraParams = [])
    {
        if (isset($this->factories[$serviceName])) {           
            if(is_string($this->factories[$serviceName]) 
                && class_exists($this->factories[$serviceName])) {
                
                $this->factories[$serviceName] = new $this->factories[$serviceName];
            }
            
            $instance = $this->factories[$serviceName]($this, $extraParams);

            foreach ($this->initializers as $initializer) {
                $initializer($instance, $this);
            }

            return $instance;
        }

        return null;
    }

    /**
     * @param string $serviceName
     * @return null
     */
    public function getAlias($serviceName)
    {
        if (isset($this->aliases[$serviceName])) {
            return $this->aliases[$serviceName];
        }

        return null;
    }

    /**
     * @param string $serviceName
     * @param string $alias
     * @param bool $allowOverride
     * @return ServiceManagerInterface
     * @throws RuntimeException
     */
    public function registerAlias($serviceName, $alias, $allowOverride = false)
    {
        if (!isset($this->aliases[$serviceName]) || $allowOverride) {
            $this->aliases[$serviceName] = $alias;
        } else {
            throw new RuntimeException(sprintf('Alias "%s" has already been registered.', $serviceName));
        }

        return $this;
    }

    /**
     * @param string $serviceName
     * @param string $invokable
     * @param bool $allowOverride
     * @return ServiceManagerInterface
     * @throws RuntimeException
     */
    public function registerInvokable($serviceName, $invokable, $allowOverride = false)
    {
        if (!isset($this->invokables[$serviceName]) || $allowOverride) {
            $this->invokables[$serviceName] = $invokable;
        } else {
            throw new RuntimeException(sprintf('Invokable "%s" has already been registered.', $serviceName));
        }

        return $this;
    }

    /**
     * @param string $serviceName
     * @param string $singleton
     * @param bool $allowOverride
     * @return ServiceManagerInterface
     * @throws RuntimeException
     */
    public function registerSingleton($serviceName, $singleton, $allowOverride = false)
    {
        if (!isset($this->singletons[$serviceName]) || $allowOverride) {
            $this->singletons[$serviceName] = $singleton;
        } else {
            throw new RuntimeException(sprintf('Singleton "%s" has already been registered.', $serviceName));
        }

        return $this;
    }

    /**
     * @param string $serviceName
     * @param callable $factory
     * @param bool $allowOverride
     * @return ServiceManagerInterface
     * @throws RuntimeException
     */
    public function registerFactory($serviceName, callable $factory, $allowOverride = false)
    {
        if (!isset($this->singletons[$serviceName]) || $allowOverride) {
            $this->factories[$serviceName] = $factory;
        } else {
            throw new RuntimeException(sprintf('Factory "%s" has already been registered.', $serviceName));
        }

        return $this;
    }

    /**
     * Register a new service initializer
     *
     * @param string $serviceName
     * @param callable $initializer
     * @param int|null $priority
     * @return ServiceManagerInterface
     * @throws RuntimeException
     */
    public function registerInitializer($serviceName, callable $initializer, $priority = null)
    {
        if (is_string($serviceName)) {
            if ($serviceName === '*') {
                $serviceNameList = array_merge(
                    array_keys($this->invokables),
                    array_keys($this->singletons),
                    array_keys($this->factories)
                );
            } else {
                $serviceNameList = [$serviceName];
            }
        } else {
            $serviceNameList = $serviceName;
        }

        foreach ($serviceNameList as $serviceName) {
            if ($this->initializers[$serviceName] === null) {
                $this->initializers[$serviceName] = new \SplPriorityQueue();
            }

            $this->initializers[$serviceName]->insert($initializer, $priority);
        }

        return $this;
    }

    /**
     * @param ServiceManagerInterface $childManager
     * @param string $peering
     * @return ServiceManagerInterface
     */
    public function registerPeeringServiceManager(ServiceManagerInterface $childManager, $peering)
    {
        $this->peeringServiceManagers[$peering] = $childManager;

        return $this;
    }
}
