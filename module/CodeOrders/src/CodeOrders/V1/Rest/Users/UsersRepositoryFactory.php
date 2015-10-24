<?php

namespace CodeOrders\V1\Rest\Users;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use CodeOrders\V1\Rest\Users\UsersRepository;

class UsersRepositoryFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {
        $tableGateway = $sm->get('TableGateway');
        
        $repository = new UsersRepository($tableGateway);
        return $repository;
    }

}
