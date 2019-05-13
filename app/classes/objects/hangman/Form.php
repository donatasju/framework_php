<?php

namespace App\Objects\Hangman;

class Form extends \Core\Page\Objects\Form {

    public function __construct() {
        parent::__construct([
            'pre_validate' => [],
            'fields' => [
                'letter' => [
                    'label' => 'Enter letter',
                    'type' => 'text',
                    'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
                    'placeholder' => '',
                    'validate' => [
                        'validate_not_empty',
                    ]
                ],
            ],
            'validate' => [],
            'buttons' => [
                'submit' => [
                    'text' => 'Speti!'
                ]
            ]
        ]);
    }

}
