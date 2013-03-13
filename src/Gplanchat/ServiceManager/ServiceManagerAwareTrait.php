<?php

namespace Gplanchat\ServiceManager;

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
