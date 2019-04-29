<?php

namespace App;

class App extends \App\Abstracts\App {
    
    public function __construct() {
        self::$db_conn = new \Core\Database\Connection(DB_CREDENTIALS);
        self::$db_schema = new \Core\Database\Schema(self::$db_conn, DB_NAME);
        self::$user_repo = new \Core\User\Repository(self::$db_conn);
        self::$session = new \Core\User\Session(self::$user_repo);
    }

}
