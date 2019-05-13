<?php

function validate_not_negative($field_input, &$field, &$safe_input) {

    if ($field_input > 0) {
        return true;
    } else {
        $field['error_msg'] = strtr('Jobans/a tu buhurs/gazele, '
                . 'nes @field privalo buti teigiamas', ['@field' => $field['label']
        ]);
    }
}

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

function validate_login(&$safe_input, &$form) {
    $status = \App\App::$session->login($safe_input['email'], $safe_input['password']);
    switch ($status) {
        case Core\User\Session::LOGIN_SUCCESS:
            return true;
    }

    $form['error_msg'] = 'Blogas Email/Password!';
}

function validate_form_file(&$safe_input, &$form) {
    $file_saved_url = save_file($safe_input['photo']);
    if ($file_saved_url) {
        $safe_input['photo'] = 'uploads/' . $file_saved_url;
        return true;
    } else {
        $form['error_msg'] = 'Jobans/a tu buhurs/gazele nes failas supistas!';
    }
}

function save_file($file, $dir = 'uploads', $allowed_types = ['image/png', 'image/jpeg', 'image/gif']) {
    if ($file['error'] == 0 && in_array($file['type'], $allowed_types)) {
        $target_file_name = microtime() . '-' . strtolower($file['name']);
        $target_path = $dir . '/' . $target_file_name;
        if (move_uploaded_file($file['tmp_name'], $target_path)) {
            return $target_file_name;
        }
    }
    return false;
}