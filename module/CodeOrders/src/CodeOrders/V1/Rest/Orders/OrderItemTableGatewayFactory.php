<?php

namespace CodeOrders\V1\Rest\Orders;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Db\ResultSet\HydratingResultSet;

class OrderItemTableGatewayFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $hydrator = new ClassMethods(true);        
        $hydrator->addStrategy('items', new OrderItemHydratorStrategy($hydrator));        
        $hydratingResultSet = new HydratingResultSet($hydrator, new OrderItemEntity());
        
        $adapter = $serviceLocator->get('DbAdapter');
        return new TableGateway('order_items', $adapter, null, $hydratingResultSet);
    }

}
