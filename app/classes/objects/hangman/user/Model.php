<?php

namespace App\Objects\Hangman\User;

class Model extends \Core\Database\Model {

    public function __construct(\Core\Database\Connection $conn) {

        parent::__construct($conn, 'user', [
            [
                'name' => 'word_id',
                'type' => self::NUMBER_SHORT,
                'flags' => [self::FLAG_NOT_NULL]
            ],
            [
                'name' => 'email',
                'type' => self::TEXT_SHORT,
                'flags' => [self::FLAG_NOT_NULL, self::FLAG_PRIMARY]
            ],
            [
                'name' => 'guess_letter',
                'type' => self::TEXT_SHORT,
                'flags' => [self::FLAG_NOT_NULL]
            ],
            [
                'name' => 'completed',
                'type' => self::TEXT_SHORT,
                'flags' => [self::FLAG_NOT_NULL]
            ],
        ]);
    }

}
