<?php

namespace CodeOrders\V1\Rest\Orders;

use Zend\Db\TableGateway\TableGatewayInterface;

class OrderItemRepository
{
    
    private $tableGateway;
    
    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }
    
    public function findAll()
    {
        return $this->tableGateway->select();
    }
    
    public function find($id)
    {
        return $this->tableGateway->select(['id' => $id])->current();
    }
    
    public function findByOrderId($orderId)
    {
        return $this->tableGateway->select(['order_id' => $orderId]);
    }
    
    public function insert(array $data)
    {
        return $this->tableGateway->insert($data);
    }
    
    public function delete($id)
    {
        return $this->tableGateway->delete(['id' => $id]);
    }
    
    public function update($id, array $data)
    {
        return $this->tableGateway->update($data, ['id' => $id]);
    }
    
    /**
     * @return \Zend\Db\TableGateway\TableGateway
     */
    public function getTableGateway()
    {
        return $this->tableGateway;
    }
}
