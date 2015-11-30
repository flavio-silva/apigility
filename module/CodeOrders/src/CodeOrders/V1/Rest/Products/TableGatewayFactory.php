<?php

namespace CodeOrders\V1\Rest\Products;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Stdlib\Hydrator\ClassMethods as Hydrator;
use CodeOrders\V1\Rest\Products\ProductsEntity;

class TableGatewayFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $adapter = $serviceLocator->get('DbAdapter');
        
        $hydratingResultSet = new HydratingResultSet(new Hydrator(false), new ProductsEntity());
        
        $tableGateway = new TableGateway('products', $adapter, null, $hydratingResultSet);
        
        return $tableGateway;
    }

}
