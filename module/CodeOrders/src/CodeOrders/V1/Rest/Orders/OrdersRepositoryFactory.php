<?php

namespace CodeOrders\V1\Rest\Orders;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class OrdersRepositoryFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $sm)
    {
        $orderItemRepository = $sm->get('CodeOrders\\V1\\Rest\\Orders\\OrderItemRepository');
        $tableGateway = $sm->get('table-gateway-orders');
        
        return new OrdersRepository($tableGateway, $orderItemRepository);
    }

}
