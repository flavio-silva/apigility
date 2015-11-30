<?php

namespace CodeOrders\V1\Rest\Products;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ProductsRepositoryFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $tableGateway = $serviceLocator->get('table-gateway-products');
        $repo = new ProductsRepository($tableGateway);
        
        return $repo;
    }

}
