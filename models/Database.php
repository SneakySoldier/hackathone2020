<?php

class Database
{
    private static $_connection;

    private static function connect()
    {
        self::$_connection = mysqli_connect('172.17.0.2', 'root', 'root', 'hackathon');
        if (!self::$_connection) {
            die('Error connect to DataBase');
        }
    }

    public static function query($sql)
    {
        if (!self::$_connection) self::connect();
        $query = mysqli_query(self::$_connection, $sql);
        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    }

    public static function exec($sql)
    {
        if (!self::$_connection) self::connect();
        $stmt = mysqli_prepare(self::$_connection, $sql);

        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
    }
}
