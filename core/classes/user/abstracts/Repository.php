<?php

namespace Core\User\Abstracts;

abstract class Repository extends \Core\User\Model {

    const REGISTER_SUCCESS = 1;
    const REGISTER_ERR_EXISTS = -1;
    
    /**
     * Patikrinam are user'is su tokiu email'u egzistuoja
     * Jeigu ne, tada įtraukiam jį į duombazę ir
     * returniname REGISTER_SUCCESS
     * Jeigu egzistuoja, returniname REGISTER_ERR_EXISTS
     */
    abstract public function register(\Core\User\User $user);
    
    /**
     * Loads user via $email
     * 
     * @return \Core\User\User
     */
    abstract public function load($email);
    
    /**
     * Inserts user to database
     */
    abstract public function insert(\Core\User\User $user);

    /**
     * Updates user in database
     */
    abstract public function update(\Core\User\User $user);

    
    /**
     * Deletes user from database
     */
    abstract public function delete(\Core\User\User $user);
    
}