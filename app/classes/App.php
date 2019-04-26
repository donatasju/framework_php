<?php

namespace App;

class App extends \App\Abstracts\App {
    
        /**
     * Database Connection
     * Responsible for connecting to MySQL database
     * @var \Core\Database\Connection
     */
    public static $db_conn;

    /**
     * Database Schema
     * Responsible for database schema in MySQL
     * @var \Core\Database\Schema
     */
    public static $db_schema;

    /**
     * User Repository
     * Handles user data
     * @var \Core\User\Repository
     */
    public static $user_repo;

    /**
     * Session
     * Handles login operations
     * @var \Core\User\Session
     */
    public static $session;

    public function __construct() {
        self::$db_conn = new \Core\Database\Connection(DB_CREDENTIALS);
        self::$db_schema = new \Core\Database\Schema(self::$db_conn, DB_NAME);
        self::$user_repo = new \Core\User\Repository(self::$db_conn);
        self::$session = new \Core\User\Session(self::$user_repo);
    }

}
