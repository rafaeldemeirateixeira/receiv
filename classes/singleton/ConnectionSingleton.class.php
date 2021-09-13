<?php

class ConnectionSingleton
{


    public static $connection;

    private function __construct()
    {
        // singleton
    }

    public static function get()
    {
        if (!isset(self::$connection)) {
            self::$connection = new PDO('mysql:host=mysql:3306;dbname=receiv', 'root', 'secret', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$connection->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        }

        return self::$connection;
    }
}
