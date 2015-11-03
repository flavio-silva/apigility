<?php

namespace CodeOrders\V1\Rest\Products;

use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Stdlib\Hydrator\ObjectProperty as Hydrator;
use Zend\Paginator\Adapter\DbTableGateway;

class ProductsRepository
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
    
    public function insert($data)
    {
        $hydrator = new Hydrator(false);
        $set = $hydrator->extract($data);
        
        return $this->tableGateway->insert($set);
    }
    
    public function delete($id)
    {
        return $this->tableGateway->delete(['id' => $id]);
    }
    
    public function findAll()
    {
        return new ProductsCollection(new DbTableGateway($this->tableGateway));
    }
    
    public function update($id, $data)
    {
        $hydrator = new Hydrator(false);
        $set = $hydrator->extract($data);
        
        return $this->tableGateway->update($set, ['id' => $id]);
    }
}