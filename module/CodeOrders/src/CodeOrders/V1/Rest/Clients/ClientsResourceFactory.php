<?php
namespace CodeOrders\V1\Rest\Clients;

class ClientsResourceFactory
{
    public function __invoke($services)
    {
        $clientsRepository = $services->get('CodeOrders\\V1\\Rest\\Clients\\ClientsRepository');
        return new ClientsResource($clientsRepository);
    }
}
