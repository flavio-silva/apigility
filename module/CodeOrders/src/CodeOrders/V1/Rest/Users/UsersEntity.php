<?php

namespace CodeOrders\V1\Rest\Users;

class UsersEntity
{
    private $id;
    private $username;
    private $password;
    private $first_name;
    private $last_name;
    private $role;
    
    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getFirst_name()
    {
        return $this->first_name;
    }

    public function getLast_name()
    {
        return $this->last_name;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function setFirst_name($first_name)
    {
        $this->first_name = $first_name;
        return $this;
    }

    public function setLast_name($last_name)
    {
        $this->last_name = $last_name;
        return $this;
    }

    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }    
}
