<?php


namespace CodeOrders\V1\Rest\Users;

use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Paginator\Adapter\DbTableGateway;

class UsersRepository
{
    
  /**
   * @var TableGatewayInterface 
   */  
    protected $tableGateway;
    
    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }
    
    public function findAll()
    {
        return new UsersCollection(new DbTableGateway($this->tableGateway) );
    }
    
    public function find($id)
    {
        return $this->tableGateway->select(['id' => $id])->current();
    }
    
    public function delete($id)
    {
        return $this->tableGateway->delete(['id' => $id]);
    }
    
    public function insert($data)
    {
        return $this->tableGateway->insert($data);
    }
}
