<?php

namespace App\Objects\Hangman\Dictionary;

class Model extends \Core\Database\Model {

    public function __construct(\Core\Database\Connection $conn) {

        parent::__construct($conn, 'words', [
            [
                'name' => 'id',
                'type' => self::NUMBER_SHORT,
                'flags' => [self::FLAG_NOT_NULL, self::FLAG_AUTO_INCREMENT, self::FLAG_PRIMARY]
            ],
            [
                'name' => 'words',
                'type' => self::TEXT_SHORT,
                'flags' => [self::FLAG_NOT_NULL]
            ],
        ]);
    }

}
