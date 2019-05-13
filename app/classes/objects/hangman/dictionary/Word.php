<?php

namespace App\Objects\Hangman\Dictionary;

class Word {

    protected $data;

    public function __construct($data = null) {
        if (!$data) {
            $this->data = [
                'id' => null,
                'words' => null
            ];
        } else {
            $this->setData($data);
        }
    }

    public function setId(int $id) {
        $this->data['id'] = $id;
    }

    public function setWords(string $words) {
        $this->data['words'] = $words;
    }

    public function getId() {
        return $this->data['id'];
    }

    public function getWords() {
        return $this->data['words'];
    }

    public function setData(array $data) {
        if ($data['id'] ?? null != null) {
            $this->setId($data['id']);
        }
        
        $this->setWords($data['words'] ?? '');
    }

    public function getData() {
        return $this->data;
    }

}
