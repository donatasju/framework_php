<?php

namespace App\Objects\Hangman\User;

class User {

    protected $data;

    public function __construct($data = null) {
        if (!$data) {
            $this->data = [
                'email' => null,
                'wordId' => null,
                'guessLetter' => null,
                'completed' => null
            ];
        } else {
            $this->setData($data);
        }
    }

    public function setEmail(string $email) {
        $this->data['email'] = $email;
    }

    public function setCompleted(string $completed) {
        $this->data['completed'] = $completed ? 1 : 0;
    }

    public function setGuessLetterRaw(string $guessLetter) {
        $this->data['guessLetter'] = $guessLetter;
    }
    
    public function getGuessLetterArray() {
        if ($this->getGuessLetter()) {
            return explode(',', $this->getGuessLetter());
        }
        
        return [];
    }
    
    public function addGuessLetter(string $letter) {
        $letters = $this->getGuessLetterArray();
        $letters[] = $letter;
        $this->setGuessLetterArray($letters);
    }
    
    public function setGuessLetterArray(array $letters) {
        $this->setGuessLetterRaw(implode(',', $letters));
    }

    public function setWordId(int $wordId) {
        $this->data['wordId'] = $wordId;
    }

    public function getEmail() {
        return $this->data['email'];
    }

    public function getWordId() {
        return $this->data['wordId'];
    }

    public function getGuessLetter() {
        return $this->data['guessLetter'];
    }

    public function getCompleted() {
        return $this->data['completed'];
    }

    public function setData(array $data) {
        $this->setEmail($data['email'] ?? '');
        $this->setWordId($data['wordId'] ?? null);
        $this->setCompleted($data['completed'] ?? '');
        $this->setGuessLetterRaw($data['guessLetter'] ?? '');
    }

    public function getData() {
        return $this->data;
    }

}
