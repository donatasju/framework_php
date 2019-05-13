<?php

/**
 * Checks if field is empty
 * 
 * @param string $field_input
 * @param array $field $form Field
 * @return boolean
 */
function validate_not_empty($field_input, &$field, $safe_input) {
    if (strlen($field_input) == 0) {
        $field['error_msg'] = strtr('Jobans/a tu buhurs/gazele, '
                . 'kad palikai @field tuscia!', ['@field' => $field['label']
        ]);
    } else {
        return true;
    }
}

/**
 * Checks if field is a number
 * 
 * @param string $field_input
 * @param array $field $form Field
 * @return boolean
 */
function validate_is_number($field_input, &$field, $safe_input) {
    if (!is_numeric($field_input)) {
        $field['error_msg'] = strtr('Jobans/a tu buhurs/gazele, '
                . 'nes @field nera skaicius!', ['@field' => $field['label']
        ]);
    } else {
        return true;
    }
}

function validate_larger_than_5($field_input, &$field, $safe_input) {
    if ($field_input < 5) {
        $field['error_msg'] = strtr('Jobans/a tu buhurs/gazele, '
                . 'nes @field per mažai isineši!', ['@field' => $field['label']
        ]);
    } else {
        return true;
    }
}

function validate_larger_than_1($field_input, &$field, $safe_input) {
    if ($field_input < 1) {
        $field['error_msg'] = strtr('Jobans/a tu buhurs/gazele, '
                . 'nes @field per mažai statai!', ['@field' => $field['label']
        ]);
    } else {
        return true;
    }
}

function validate_user_balance($field_input, &$field, $safe_input) {
    $repo = new \App\User\Repository(\App\App::$db_conn);
    $user = $repo->load(\App\App::$session->getUser()->getEmail());
    if ($field_input > $user->getBalance()) {
        $field['error_msg'] = strtr('Jobans/a tu buhurs/gazele, '
                . 'nes @field pinigu neturi bomzas!', ['@field' => $field['label']
        ]);
    } else {
        return true;
    }
}

function validate_file($field_input, &$field, &$safe_input) {
    $file = $_FILES[$field['id']] ?? false;
    if ($file) {
        if ($file['error'] == 0) {
            $safe_input[$field['id']] = $file;
            return true;
        }
    }

    $field['error_msg'] = 'Nenurodei fotkes';
}

function validate_email($field_input, &$field, &$safe_input) {
    if (preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $safe_input['email'])) {
        return true;
    } else {
        $field['error_msg'] = strtr('Jobans/a tu buhurs/gazele, '
                . 'nes @field blogai uzrasytas!', ['@field' => $field['label']
        ]);
    }
}

function validate_age($field_input, &$field, &$safe_input) {
    if ($safe_input['age'] > 0) {
        return true;
    } else {
        $field['error_msg'] = strtr('Jobans/a tu buhurs/gazele, '
                . 'nes @field negali but mazesnis uz 0!', ['@field' => $field['label']
        ]);
    }
}

function validate_contains_space($field_input, &$field, &$safe_input) {
    if (preg_match('/\s/', $safe_input['full_name'])) {
        return true;
    } else {
        $field['error_msg'] = strtr('Jobans/a tu buhurs/gazele, '
                . 'nes @field privalo tureti tarpa!', ['@field' => $field['label']
        ]);
    }
}

function validate_more_4_chars($field_input, &$field, &$safe_input) {
    if (strlen($safe_input['full_name']) > 4) {
        return true;
    } else {
        $field['error_msg'] = strtr('Jobans/a tu buhurs/gazele, '
                . 'nes @field privalo buti ilgesnis nei 4 simboliai', ['@field' => $field['label']
        ]);
    }
}

function validate_field_select($field_input, &$field, &$safe_input) {
    if (array_key_exists($field_input, $field['options'])) {
        return true;
    } else {
        $field['error_msg'] = strtr('Jobans/a tu buhurs/gazele, '
                . 'nes @field yra neteisingas', ['@field' => $field['label']
        ]);
    }
}

function validate_no_numbers($field_input, &$field, &$safe_input) {
    if (1 !== preg_match('~[0-9]~', $field_input)) {
        return true;
    }
    $field['error_msg'] = strtr('Jobans/a tu buhurs/gazele, '
            . 'nes @field negali būti skaičiu', ['@field' => $field['label']
    ]);
}
