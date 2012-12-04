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

/**
 * Service Manager configuration helper
 */
class Configurator
{
    public function __invoke(ServiceManagerInterface $serviceManager, array $configuration)
    {
        if (isset($configuration['invokables'])) {
            foreach ($configuration['invokables'] as $serviceName => $invokable) {
                $serviceManager->registerInvokable($serviceName, $invokable);
            }
        }

        if (isset($configuration['singletons'])) {
            foreach ($configuration['singletons'] as $serviceName => $singleton) {
                $serviceManager->registerSingleton($serviceName, $singleton);
            }
        }

        if (isset($configuration['aliases'])) {
            foreach ($configuration['aliases'] as $serviceName => $alias) {
                $serviceManager->registerAlias($serviceName, $alias);
            }
        }

        if (isset($configuration['factories'])) {
            foreach ($configuration['factories'] as $serviceName => $factory) {
                $serviceManager->registerFactory($serviceName, $factory);
            }
        }
    }
}
