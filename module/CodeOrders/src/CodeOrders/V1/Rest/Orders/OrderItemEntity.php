<?php

namespace CodeOrders\V1\Rest\Orders;


class OrderItemEntity
{
    private $id;
    private $orderId;
    private $productId;
    private $quantity;
    private $price;
    private $total;
    
    public function getId()
    {
        return $this->id;
    }

    public function getOrderId()
    {
        return $this->orderId;
    }

    public function getProductId()
    {
        return $this->productId;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
        return $this;
    }

    public function setProductId($productId)
    {
        $this->productId = $productId;
        return $this;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    public function setTotal($total)
    {
        $this->total = $total;
        return $this;
    }


}
