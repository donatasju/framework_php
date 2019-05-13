<?php

namespace App\Objects\Hangman\User;

class Repository {
    
    const REGISTER_SUCCESS = 1;
    const REGISTER_ERR_EXISTS = -1;
    
    protected $model;

    public function __construct(\Core\Database\Connection $c) {
        $this->model = new \App\Objects\Hangman\User\Model($c);
    }
    
    public function register(\App\Objects\Hangman\User\User $user) {
        if (!$this->exists($user)) {
            $this->insert($user);

            return self::REGISTER_SUCCESS;
        }

        return self::REGISTER_ERR_EXISTS;
    }

    public function insert(\App\Objects\Hangman\User\User $user) {
        return $this->model->insertIfNotExists(
                        $user->getData(), ['email']
        );
    }

    public function load($email) {
        $rows = $this->model->load([
            'email' => $email
        ]);

        foreach ($rows as $row) {
            return new \App\Objects\Hangman\User\User ($row);
        }
    }

    public function loadAll() {
        $rows = $this->model->load();
        $users = [];

        foreach ($rows as $row) {
            $users[] = new \App\Objects\Hangman\User\User($row);
        }

        return $hangmans;
    }

    public function update(\App\Objects\Hangman\User\User $user) {
        return $this->model->update($user->getData(), [
                    'email' => $user->getEmail()
        ]);
    }

    public function delete(\App\Objects\Hangman\User\User $user) {
        var_dump($user);
        return $this->model->delete([
                    'email' => $user->getEmail()
        ]);
    }

    public function deleteAll() {
        return $this->model->delete();
    }

    public function exists($email) {
        $this->model->exists([
            'email' => $email
        ]);
    }
}
