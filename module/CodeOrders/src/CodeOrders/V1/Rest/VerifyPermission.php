<?php

namespace CodeOrders\V1\Rest;

trait VerifyPermission
{
    public function getAuthenticatedUser()
    {
        /* @var $userRepository \CodeOrders\V1\Rest\Users\UsersRepository */
        $userRepository = $this->getServiceLocator()->get('CodeOrders\V1\Rest\Users\UsersRepository');
        return $userRepository->findByUsername($this->getIdentity()->getRoleId());
    }

    public function hasPermission($role)
    {
        if ($this->getAuthenticatedUser()->getRole() !== $role) {
            return false;
        }
        
        return true;
    }

}
