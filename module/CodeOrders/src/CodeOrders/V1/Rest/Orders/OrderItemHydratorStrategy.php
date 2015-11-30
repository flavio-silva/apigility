<?php

namespace CodeOrders\V1\Rest\Orders;

use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;
use Zend\Stdlib\Hydrator\ClassMethods;

class OrderItemHydratorStrategy implements StrategyInterface
{
    /**
     * @var use Zend\Stdlib\Hydrator\ClassMethods;
     */
    private $hydrator;
    
    public function __construct(ClassMethods $hydrator)
    {
        
        $this->hydrator = $hydrator;
    }
    
    public function extract($items)
    {
        $data = [];
        
        foreach($items as $item) {
            
            $data[] = $this->hydrator->extract($item);
        }
        
        return $data;
    }

    public function hydrate($value)
    {
        throw new \RuntimeException('Hydration is not supported');
    }

}
