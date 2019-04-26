<?php
require_once '../bootloader.php';

use \App\App;

$form = [
    'pre_validate' => [],
    'fields' => [],
    'validate' => [],
    'buttons' => [
        'submit' => [
            'text' => 'Logout'
        ]
    ],
    'callbacks' => [
        'success' => [],
        'fail' => []
    ]
];

if (App::$session->isLoggedIn()) {
    if (!empty($_POST)) {
        $safe_input = get_safe_input($form);
        $form_success = validate_form($safe_input, $form);
        if ($form_success) {
            \App\App::$session->logout();
        }
    }
}
if (!App::$session->isLoggedIn()) {
    header('Location: login.php');
    exit();
}
?>
<html>
    <body class="logout-bg">
        <section class="form container-fluid">

            <!-- Content -->
            <h1>Do you really want to logout?</h1>

            <!-- Form -->
            <?php require '../core/views/form.php'; ?>

        </section>
    </body>
</html>

