<?php

namespace CodeOrders\V1\Rest\Clients;

use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Stdlib\Hydrator\ObjectProperty as Hydrator;
use CodeOrders\V1\Rest\Clients\ClientsCollection;
use Zend\Paginator\Adapter\ArrayAdapter;

class ClientsRepository
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function find($id)
    {
        return $this->tableGateway->select(['id' => $id])->current();
    }

    public function findAll()
    {
        $repository = $this->tableGateway->select();
        return new ClientsCollection(new ArrayAdapter($repository->toArray()));
    }

    public function delete($id)
    {
        return $this->tableGateway->delete(['id' => $id]);
    }

    public function update($id, $data)
    {
        
        return $this->tableGateway->update((new Hydrator($data))->extract($data), ['id' => $id]);
    }

    public function insert($data)
    {
        return $this->tableGateway->insert((new Hydrator($data))->extract($data));
    }
}