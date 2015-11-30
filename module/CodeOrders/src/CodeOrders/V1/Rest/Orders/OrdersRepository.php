<?php

namespace CodeOrders\V1\Rest\Orders;

use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Paginator\Adapter\ArrayAdapter;

class OrdersRepository
{

    private $tableGateway;
    private $orderItemRepository;

    public function __construct(TableGatewayInterface $tableGateway, OrderItemRepository $orderItemRepository)
    {
        $this->tableGateway = $tableGateway;
        $this->orderItemRepository = $orderItemRepository;
    }

    public function find($id)
    {
        $order = $this->tableGateway->select(['id' => $id]);
        $res = $this->iterator($order);
        return $res[0];
    }

    public function findAll()
    {
        $orders = $this->tableGateway->select();
        return $this->getOrdersCollection($orders);
    }
    
    public function findByUserId($userId)
    {
        $orders =  $this->tableGateway->select(['user_id' => $userId]);
        return $this->getOrdersCollection($orders);
        
    }
    
    private function getOrdersCollection($orders)
    {
        $res = $this->iterator($orders);
        return new OrdersCollection(new ArrayAdapter($res));
    }
    
    private function iterator($orders)
    {
        $res = [];

        foreach ($orders as $order) {
            $items = $this->orderItemRepository->findByOrderId($order->getId());

            foreach ($items as $item) {
                $order->addItem($item);
            }

            $res[] = $items->getHydrator()->extract($order);
        }

        return $res;
    }

    /**
     * 
     * @return OrderItemRepository
     */
    public function getOrderItemRepository()
    {
        return $this->orderItemRepository;
    }

    public function insert(array $data)
    {

        $this->tableGateway->insert($data);

        return $this->tableGateway->getLastInsertValue();
    }

    public function delete($id)
    {
        return $this->tableGateway->delete(['id' => $id]);
    }

    /**
     * 
     * @return \Zend\Db\TableGateway\TableGateway
     */
    public function getTableGateway()
    {
        return $this->tableGateway;
    }
    
    public function update($id, array $data)
    {
        return $this->tableGateway->update($data, ['id' => $id]);
    }

}
