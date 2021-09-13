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
            self::$connection = new PDO('mysql:host=l0ebsc9jituxzmts.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306;dbname=xrg41l9lpsj92cih', 'q3sj1x3qm4fud7uc', 't141se23vuhve4qq', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$connection->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        }

        return self::$connection;
    }
}
