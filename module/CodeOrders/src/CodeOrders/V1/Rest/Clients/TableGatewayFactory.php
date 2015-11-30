<?php

namespace CodeOrders\V1\Rest\Clients;

use Zend\Db\TableGateway\TableGateway;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Stdlib\Hydrator\ClassMethods as Hydrator;

class TableGatewayFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $hydratingResultSet = new HydratingResultSet(new Hydrator(), new ClientsEntity());

        $dbAdapter = $serviceLocator->get('DbAdapter');
        return new TableGateway('clients', $dbAdapter, null, $hydratingResultSet);
    }

}