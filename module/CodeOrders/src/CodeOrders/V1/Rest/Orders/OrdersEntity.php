<?php
namespace CodeOrders\V1\Rest\Orders;

class OrdersEntity
{
    private $id;
    private $clientId;
    private $userId;
    private $pTypeId;
    private $total;
    private $status;
    private $createdAt;
    private $items = [];

   
    public function getId()
    {
        return $this->id;
    }

    public function getClientId()
    {
        return $this->clientId;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getPTypeId()
    {
        return $this->pTypeId;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
        return $this;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    public function setPTypeId($pTypeId)
    {
        $this->pTypeId = $pTypeId;
        return $this;
    }

    public function setTotal($total)
    {
        $this->total = $total;
        return $this;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }
    
    public function getItems()
    {
        return $this->items;
    }

    public function addItem($item)
    {
        $this->items[] = $item;
        return $this;
    }


}
