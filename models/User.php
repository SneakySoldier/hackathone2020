<?php

require_once 'Database.php';

class User
{
    public static function get($id)
    {
        $sql = "SELECT * FROM `users` WHERE `id` = '$id'";
        $rows = Database::query($sql);
        return $rows[0];
    }

    public static function signIn()
    {
    }

    public static function signOut()
    {
    }

    public static function register()
    {
    }
    
    public static function isAdmin($id)
    {
        return self::get($id)['is_admin'] == 1;
    }

}
