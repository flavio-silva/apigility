<?php
namespace CodeOrders\V1\Rest\Products;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class ProductsResource extends AbstractResourceListener
{
    
    private $productsRepository;
    
    public function __construct(ProductsRepository $productsRepository)
    {
        $this->productsRepository = $productsRepository;
    }
    
    
    public function create($data)
    {
        return $this->productsRepository->insert($data);
    }

    
    public function delete($id)
    {
        $this->productsRepository->delete($id);
        return true;
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
        return $this->productsRepository->find($id);
    }
   
    public function fetchAll($params = array())
    {
        return $this->productsRepository->findAll();
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
        return $this->productsRepository->update($id, $data);
    }
}
