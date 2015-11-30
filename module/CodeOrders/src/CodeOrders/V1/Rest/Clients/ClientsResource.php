<?php

namespace CodeOrders\V1\Rest\Clients;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ClientsResource extends AbstractResourceListener implements ServiceLocatorAwareInterface
{
    use \CodeOrders\V1\Rest\VerifyPermission;
    
    private $clientRepository;
    private $serviceLocator;
    
    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }

    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
    }
    
    public function __construct(ClientsRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function create($data)
    {   
        if($this->hasPermission('admin')) {
            return $this->clientRepository->insert($data);
        }
        
        return new ApiProblem(403, 'Only adminstrator has access to this resource');
    }
   
    public function delete($id)
    {
        if($this->hasPermission('admin')) {
            $this->clientRepository->delete($id);
            return true;
        }
        
        return new ApiProblem(403, 'Only adminstrator has access to this resource');
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
   
    public function fetch($id)
    {
        if($this->hasPermission('admin') || $this->hasPermission('salesman')) {
            return $this->clientRepository->find($id);
        }
        
        return new ApiProblem(403, 'Only administrator or salesman has access to this resource');
    }

    
    public function fetchAll($params = array())
    {
        if($this->hasPermission('admin') || $this->hasPermission('salesman')) {
            return $this->clientRepository->findAll();
        }
        
        return new ApiProblem(403, 'Only administrator or salesman has access to this resource');
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
        if($this->hasPermission('admin')) {
            return $this->clientRepository->update($id, $data);
        }
        
        return new ApiProblem(403, 'Only adminstrator has access to this resource');
    }
}
