<?php

require_once '../bootloader.php';

function validate_user_exists($field_input, &$field, &$safe_input) {

    if (!\App\App::$user_repo->exists($field_input)) {
        return true;
    } else {
        $field['error_msg'] = 'Tokiu emailu useris jau yra!';
    }
}

function validate_string_lenght_10_chars($field_input, &$field, &$safe_input) {
    if (strlen($field_input) > 10) {
        return true;
    } else {
        $field['error_msg'] = strtr('Jobans/a tu buhurs/gazele, '
                . 'nes @field privalo buti ilgesnis nei 10 simboliu', ['@field' => $field['label']
        ]);
    }
}

function validate_string_lenght_60_chars($field_input, &$field, &$safe_input) {
    if (strlen($field_input) < 60) {
        return true;
    } else {
        $field['error_msg'] = strtr('Jobans/a tu buhurs/gazele, '
                . 'nes @field privalo buti trumpesnis nei 60 simboliu', ['@field' => $field['label']
        ]);
    }
}
