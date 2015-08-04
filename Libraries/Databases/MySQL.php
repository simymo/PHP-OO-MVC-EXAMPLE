<?php

namespace Libraries\Databases;

class MySQL
{
    protected static $singleton = null;
    protected static $connection = null;

    protected static $dbHost, $dbName, $dbUser, $dbPass;

    private function __construct()
    {
        $database = config('database.mysql');
        self::$dbHost = $database['dbHost'];
        self::$dbName = $database['dbName'];
        self::$dbUser = $database['dbUser'];
        self::$dbPass = $database['dbPass'];
    }


    public static function connect()
    {
        if (self::$singleton == null) {
            $conn = null;

            try {
                self::$singleton = new MySQL;

                $conn = new \PDO('mysql:host='.self::$dbHost.';dbname='.self::$dbName, self::$dbUser, self::$dbPass);
                $conn->setAttribute(
                    \PDO::ATTR_ERRMODE,
                    \PDO::ERRMODE_EXCEPTION
                    );

            } catch (\PDOException $e) {
                //log here
                echo 'Failed to connect to Database: ' . $e->getMessage();
                die();
            }

            self::$connection = $conn;
        }

        return self::$connection;
    }
}
