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

use Gplanchat\ServiceManager\ServiceManagerTrait;
use Gplanchat\ServiceManager\ServiceManagerInterface;

/**
 * A basic service manager, nothing is implemented here, all is in the traits
 */
abstract class AbstractServiceManager
    implements ServiceManagerInterface
{
    use ServiceManagerTrait;

    /**
     * @param array $config
     * @param Configurator $configurator
     */
    public function __construct(array $config = null, Configurator $configurator = null)
    {
        if ($config !== null) {
            if ($configurator === null) {
                $configurator = new Configurator();
            }

            $configurator($this, $config);
        }
    }
}
