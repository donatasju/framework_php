<?php
require_once '../bootloader.php';

$connection = new \Core\Database\Connection(DB_CREDENTIALS);

$pdo = $connection->getPDO();
$schema = new \Core\Database\Schema($connection, DB_NAME);
$schema->init();

$model_user = new \Core\User\Repository($connection);
$model_user->insertIfNotExists([
    'email' => 'valdau@nx.com',
    'password' => 'bbd',
    'full_name' => 'Zanas Vandamas',
    'age' => 26,
    'gender' => 'm'
        ], [
    'email'
]);

$users = $model_user->load();
?>
<html>
    <head>
        <title>Tyler`s Framework</title>
    </head>
    <body>
        <?php foreach ($users as $user): ?>
            <ul>
                <?php foreach ($user as $col => $value): ?>
                    <li>
                        <b><?php print $col; ?></b>
                        <i><?php print $value; ?></i>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endforeach; ?>
    </body>
</html>
