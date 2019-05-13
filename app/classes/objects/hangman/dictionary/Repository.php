<?php

namespace App\Objects\Hangman\Dictionary;

class Repository {
    
    const REGISTER_SUCCESS = 1;
    const REGISTER_ERR_EXISTS = -1;
    
    protected $model;

    public function __construct(\Core\Database\Connection $c) {
        $this->model = new \App\Objects\Hangman\Dictionary\Model($c);
    }
    
    public function register(\App\Objects\Hangman\Dictionary\Word $word) {
        if (!$this->exists($word)) {
            $this->insert($word);

            return self::REGISTER_SUCCESS;
        }

        return self::REGISTER_ERR_EXISTS;
    }

    public function insert(\App\Objects\Hangman\Dictionary\Word $word) {
        return $this->model->insertIfNotExists(
                        $word->getData(), ['words']
        );
    }
    
    public function loadAny() {
        $data = $this->model->load([], [], 0, 1);
        if ($data) {
            return new Word($data[0]);
        }   
    }
    
    public function loadById($id) {
        $data = $this->model->load(['id' => $id]);
        if ($data) {
            return new Word($data[0]);
        }   
    }    

    public function load($email) {
        $rows = $this->model->load([
            'email' => $email
        ]);

        foreach ($rows as $row) {
            return new \App\Objects\Hangman\Dictionary\Word ($row);
        }
    }

    public function loadAll() {
        $rows = $this->model->load();
        $words = [];

        foreach ($rows as $row) {
            $words[] = new \App\Objects\Hangman\Dictionary\Word($row);
        }

        return $words;
    }

    public function update(\App\Objects\Hangman\Dictionary\Word $word) {
        return $this->model->update($word->getData(), [
                    'id' => $word->getId()
        ]);
    }

    public function delete(\App\Objects\Hangman\Dictionary\Word $word) {
        return $this->model->delete([
                    'email' => $word->getEmail()
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
