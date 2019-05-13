<?php

namespace App\Objects\Form;

class Play extends \Core\Page\Objects\Form {

    public function __construct() {
        parent::__construct([
            'pre_validate' => [],
            'fields' => [
                'dice' => [
                    'label' => 'Spėk kiek išmesi',
                    'type' => 'radio',
                    'values' => Dice::getDiceValues(),
                    'img' => Dice::getDiceImages(),
                    'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
                    'validate' => [
                        'validate_not_empty',
                    ]
                ],
                'bet_size' => [
                    'label' => 'Statyk!',
                    'type' => 'text',
                    'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
                    'placeholder' => 'Įrašyk, kiek statai',
                    'validate' => [
                        'validate_not_empty',
                        'validate_is_number',
                        'validate_larger_than_1',
                        'validate_user_balance'
                    ]
                ],
            ],
            'validate' => [],
            'buttons' => [
                'submit' => [
                    'text' => 'Mesk'
                ]
            ]
        ]);
    }

}
