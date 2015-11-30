<?php

namespace CodeOrders\V1\Rest\Orders;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Stdlib\Hydrator\ClassMethods;

class OrdersTableGatewayFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $adapter = $serviceLocator->get('DbAdapter');
        $hydratingResutSet = new HydratingResultSet(new ClassMethods(true), new OrdersEntity());
        
        $tableGateway = new TableGateway('orders', $adapter, null, $hydratingResutSet);
        return $tableGateway;
    }

}
