<?php
namespace CodeOrders\V1\Rest\Orders;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class OrdersResource extends AbstractResourceListener implements ServiceLocatorAwareInterface
{
    use \CodeOrders\V1\Rest\VerifyPermission;
    
    private $ordersService;
    private $serviceLocator;

    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
    }

    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }

    public function __construct(OrdersService $ordersService)
    {
        $this->ordersService = $ordersService;
    }

    public function create($data)
    {
        if(!$this->hasPermission('salesman')) {
            return new ApiProblem(403, 'Only salesman has access to this resource');
        }

        try {
            $result = $this->ordersService->insert($data);
           return $result;
            
        } catch (\Exception $e) {
           return new ApiProblem(400, $e->getMessage());

        }
    }
    
    public function delete($id)
    {
        if ($this->hasPermission('admin')) {
            return $this->ordersService->delete($id);
        }
        
        return new ApiProblem(403, 'Only admin can delete a resource');
    }

    /**
     * Delete a collection, or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function deleteList($data)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for collections');
    }

    /**
     * Fetch a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function fetch($id)
    {
        $entity = $this->ordersService->getOrdersRepository()->find($id);
        $authenticatedUser = $this->getAuthenticatedUser();
        
        if ($authenticatedUser->getId() === $entity['user_id']) {
            return $entity;
        }
        
        return new ApiProblem(403, "Can't access to this order");
        
    }
    
    public function fetchAll($params = array())
    {
        if ($this->hasPermission('salesman')) {
            $userId = $this->getAuthenticatedUser()->getId();
            return $this->ordersService->getOrdersRepository()->findByUserId($userId);
        }
        
        return new ApiProblem(403, 'Only salesman has access to this resource');
    }

    /**
     * Patch (partial in-place update) a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patch($id, $data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for individual resources');
    }

    /**
     * Replace a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function replaceList($data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for collections');
    }

    public function update($id, $data)
    {
        if ($this->hasPermission('admin')) {
            return $this->ordersService->update($id, $data);
        }
        
        return new ApiProblem(403, 'Only admin can update a resource');
    }
}
