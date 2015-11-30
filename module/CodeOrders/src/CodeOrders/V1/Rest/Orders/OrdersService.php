<?php

namespace CodeOrders\V1\Rest\Orders;

use Zend\Stdlib\Hydrator\ObjectProperty;

class OrdersService
{

    /**
     * @var OrdersRepository
     */
    private $repository;

    public function __construct(OrdersRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert($data)
    {
        $hydrator = new ObjectProperty();
        $arrayData = $hydrator->extract($data);

        $orderData = $arrayData;
        unset($orderData['item']);

        $tableGateway = $this->repository->getTableGateway();

        try {

            $tableGateway->getAdapter()->getDriver()->getConnection()->beginTransaction();

            $orderId = $this->repository->insert($orderData);

            foreach ($arrayData['item'] as $item) {
                $item['order_id'] = $orderId;

                $this->repository->getOrderItemRepository()->insert($item);
            }

            $tableGateway->getAdapter()->getDriver()->getConnection()->commit();

            return ['order_id' => $orderId];
        } catch (\Exception $e) {

            $tableGateway->getAdapter()->getDriver()->getConnection()->rollback();
            throw new \Exception("Can't insert any order and/or item");
        }
    }

    public function delete($id)
    {
        $tableGateway = $this->getOrdersRepository()->getTableGateway();

        try {
            $tableGateway->getAdapter()->getDriver()->getConnection()->beginTransaction();

            $orderItemRepository = $this->repository->getOrderItemRepository();
            $items = $orderItemRepository->findByOrderId($id);

            foreach ($items as $item) {
                $orderItemRepository->delete($item->getId());
            }

            $this->repository->delete($id);

            $tableGateway->getAdapter()->getDriver()->getConnection()->commit();

            return true;
        } catch (\Exception $e) {
            $tableGateway->getAdapter()->getDriver()->getConnection()->rollback();
            return false;
        }
    }

    public function update($id, $data)
    {
        $hydrator = new ObjectProperty();
        $data = $hydrator->extract($data);
        
        $conn = $this->getOrdersRepository()
                ->getTableGateway()
                ->getAdapter()
                ->getDriver()
                ->getConnection();

        try {
            $conn->beginTransaction();
            
            foreach ($data['item'] as $item) {

                $this->getOrdersRepository()
                        ->getOrderItemRepository()
                        ->update($item['id'], $item);
            }
            
            unset($data['item']);
            
            $res = $this->repository->update($id, $data);

            $conn->commit();

            return $res;
        } catch (\Exception $e) {

            $conn->rollback();
            return ['message' => $e->getMessage()];
        }
    }

    public function getOrdersRepository()
    {
        return $this->repository;
    }

}
