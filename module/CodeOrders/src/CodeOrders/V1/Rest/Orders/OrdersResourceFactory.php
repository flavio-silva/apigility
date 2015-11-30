<?php
namespace CodeOrders\V1\Rest\Orders;

class OrdersResourceFactory
{
    public function __invoke($services)
    {
        $ordersService = $services->get('CodeOrders\\V1\\Rest\\Orders\\OrdersService');
        return new OrdersResource($ordersService);
    }
}
