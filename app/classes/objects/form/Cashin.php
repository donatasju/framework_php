<?php

namespace App\Objects\Form;

class Cashin extends \Core\Page\Objects\Form {

    public function __construct() {
        parent::__construct([
            'pre_validate' => [],
            'fields' => [
                'cashin' => [
                    'label' => 'Inešti pinigu',
                    'type' => 'text',
                    'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
                    'placeholder' => '',
                    'validate' => [
                        'validate_not_empty',
                        'validate_is_number',
                        'validate_not_negative'
                    ]
                ],
            ],
            'validate' => [],
            'buttons' => [
                'submit' => [
                    'text' => 'Inešti'
                ]
            ]
        ]);
    }

}
