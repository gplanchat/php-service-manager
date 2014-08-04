<?php
/**
 * This file is part of gplanchat/php-service-manager.
 *
 * gplanchat/php-service-manager is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * gplanchat/php-service-manager is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with gplanchat/php-service-manager.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author  Grégory PLANCHAT<g.planchat@gmail.com>
 * @licence GNU Lesser General Public Licence (http://www.gnu.org/licenses/lgpl-3.0.txt)
 */

/**
 * @namespace
 */
namespace Gplanchat\ServiceManager;

/**
 * Trait ServiceManagerAwareTrait
 * @package Gplanchat\ServiceManager
 */
trait ServiceManagerAwareTrait
{
    /**
     * @var ServiceManagerInterface|null
     */
    private $serviceManager = null;

    /**
     * @return ServiceManagerInterface|null
     */
    public function getServiceManager()
    {
        return $this->serviceManager;
    }

    /**
     * @param ServiceManagerInterface $serviceManager
     * @return ServiceManagerAwareInterface
     */
    public function setServiceManager(ServiceManagerInterface $serviceManager)
    {
        $this->serviceManager = $serviceManager;

        return $this;
    }
}
