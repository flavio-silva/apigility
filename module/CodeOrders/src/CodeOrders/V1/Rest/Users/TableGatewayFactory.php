<?php

namespace CodeOrders\V1\Rest\Users;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\HydratingResultSet;
use CodeOrders\V1\Rest\Users\UsersEntity;
use Zend\Stdlib\Hydrator\ClassMethods as Hydrator;

class TableGatewayFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {
        $adapter = $sm->get('DbAdapter');        
        $hydratingResultSet = new HydratingResultSet(new Hydrator(false), new UsersEntity()) ;
        
        $tableGateway = new TableGateway('oauth_users', $adapter, null, $hydratingResultSet);
        return $tableGateway;
    }
}
