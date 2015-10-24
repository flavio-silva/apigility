<?php
namespace CodeOrders\V1\Rest\Users;

class UsersResourceFactory
{
    public function __invoke($services)
    {
        $usersRepository = $services->get('CodeOrders\\V1\\Rest\\Users\\UsersRepository');
        
        return new UsersResource($usersRepository);
    }
}
