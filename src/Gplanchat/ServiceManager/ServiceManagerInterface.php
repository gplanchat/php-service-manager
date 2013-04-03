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

use Gplanchat\ServiceManager\RuntimeException;

/**
 * Global interface for service management
 */
interface ServiceManagerInterface
{
    /**
     * Get the service instance
     *
     * @param string $serviceName
     * @param array $constructorParams
     * @param bool $ignoreInexistent
     * @throws RuntimeException
     * @return mixed
     */
    public function get($serviceName, array $constructorParams = [], $ignoreInexistent = false, $ignorePeering = false);

    /**
     * Tests if the the service is declared
     *
     * @abstract
     * @param string $serviceName
     * @return mixed
     */
    public function has($serviceName, $ignorePeering = false);

    /**
     * Detects whether the specified service name is associated with a registered service alias or not.
     *
     * @abstract
     * @param string $serviceName
     * @return bool
     */
    public function isAlias($serviceName);

    /**
     * Detects whether the specified service name is associated with a registered invokable service or not.
     *
     * @abstract
     * @param string $serviceName
     * @return bool
     */
    public function isInvokable($serviceName);

    /**
     * Detects whether the specified service name is associated with a registered singleton service or not.
     *
     * @abstract
     * @param string $serviceName
     * @return bool
     */
    public function isSingleton($serviceName);

    /**
     * Invokes a new service instance
     *
     * @abstract
     * @param string $className
     * @param array $constructorParams
     * @return mixed
     */
    public function invoke($className, array $constructorParams = []);

    /**
     * Invokes a new service using a factory
     *
     * @abstract
     * @param string $className
     * @param array $extraParams
     * @return mixed
     */
    public function invokeFactory($serviceName, array $extraParams = []);

    /**
     * Returns the aliased service
     *
     * @abstract
     * @param string $serviceName
     * @return string
     */
    public function getAlias($serviceName);

    /**
     * Register a new service alias
     *
     * @abstract
     * @param string $serviceName
     * @param string $alias
     * @param bool $allowOverride
     * @return ServiceManagerInterface
     * @throws RuntimeException
     */
    public function registerAlias($serviceName, $alias, $allowOverride = false);

    /**
     * Register a new invokable service
     *
     * @abstract
     * @param string $serviceName
     * @param string $invokable
     * @param bool $allowOverride
     * @return ServiceManagerInterface
     * @throws RuntimeException
     */
    public function registerInvokable($serviceName, $invokable, $allowOverride = false);

    /**
     * Register a new singleton service
     *
     * @abstract
     * @param string $serviceName
     * @param string $singleton
     * @param bool $allowOverride
     * @return ServiceManagerInterface
     * @throws RuntimeException
     */
    public function registerSingleton($serviceName, $singleton, $allowOverride = false);

    /**
     * Register a new service factory
     *
     * @abstract
     * @param string $serviceName
     * @param callable $factory
     * @param bool $allowOverride
     * @return ServiceManagerInterface
     * @throws RuntimeException
     */
    public function registerFactory($serviceName, callable $factory, $allowOverride = false);

    /**
     * Register a new service factory
     *
     * @abstract
     * @param callable $initializer
     * @param int|null $priority
     * @return ServiceManagerInterface
     * @throws RuntimeException
     */
    public function registerInitializer(callable $initializer, $priority = null);

    /**
     * @abstract
     * @param ServiceManagerInterface $childManager
     * @param string $peering
     * @return ServiceManagerInterface
     */
    public function registerPeeringServiceManager(ServiceManagerInterface $childManager, $peering);
}
