<?php

namespace CodeOrders\V1\Rest\Clients;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ClientsRepositoryFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {

        $tableGateway = $serviceLocator->get('table-gateway-clients');        
        return new ClientsRepository($tableGateway);
    }

}