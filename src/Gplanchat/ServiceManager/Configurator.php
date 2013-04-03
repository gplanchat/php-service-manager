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

use Traversable;

/**
 * Service Manager configuration helper
 */
class Configurator
{
    public function __invoke(ServiceManagerInterface $serviceManager, array $configuration)
    {
        if (isset($configuration['invokables']) && (is_array($configuration['invokables'] || $configuration['invokables'] instanceof Traversable))) {
            foreach ($configuration['invokables'] as $serviceName => $invokable) {
                $serviceManager->registerInvokable($serviceName, $invokable);
            }
        }

        if (isset($configuration['singletons']) && (is_array($configuration['singletons'] || $configuration['singletons'] instanceof Traversable))) {
            foreach ($configuration['singletons'] as $serviceName => $singleton) {
                $serviceManager->registerSingleton($serviceName, $singleton);
            }
        }

        if (isset($configuration['aliases']) && (is_array($configuration['aliases'] || $configuration['aliases'] instanceof Traversable))) {
            foreach ($configuration['aliases'] as $serviceName => $alias) {
                $serviceManager->registerAlias($serviceName, $alias);
            }
        }

        if (isset($configuration['factories']) && (is_array($configuration['factories'] || $configuration['factories'] instanceof Traversable))) {
            foreach ($configuration['factories'] as $serviceName => $factory) {
                $serviceManager->registerFactory($serviceName, $factory);
            }
        }

        if (isset($configuration['initializers']) && (is_array($configuration['initializers'] || $configuration['initializers'] instanceof Traversable))) {
            foreach ($configuration['initializers'] as $initializerName => $initializer) {
                $serviceManager->registerInitializer($initializerName, $initializer);
            }
        }
    }
}
