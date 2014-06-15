<?php

namespace Gplanchat\ServiceManager;

interface ServiceManagerAwareInterface
{
    public function getServiceManager();
    public function setServiceManager(ServiceManagerInterface $serviceManager);
}
