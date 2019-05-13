<?php

namespace App\User;

class User {
    
    protected $data;

    public function __construct($data = null) {
        if (!$data) {
            $this->data = [
                'email' => null,
                'balance' => null
            ];
        } else {
            $this->setData($data);
        }
    }
    
    public function setData(array $data) {
        $this->setEmail($data['email'] ?? '');
        $this->setBalance($data['balance'] ?? null);
    }
    
    public function setEmail(string $email) {
        $this->data['email'] = $email;
    }
    
    public function setBalance(float $amount) {
        $this->data['balance'] = $amount;
    }
    
    public function getEmail() {
        return $this->data['email'];
    }
    
    public function getBalance() {
        return $this->data['balance'];
    }
    
    public function getData() {
        return $this->data;
    }
}
