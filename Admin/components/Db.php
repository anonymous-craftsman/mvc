<?php


class Db
{
    public static function getConnection () {
        $paramsPatch = ROOT."/config/param.php";
        $params = include ($paramsPatch);
        $dns = "mysql:host={$params['host']};dbname={$params['db_name']}";
        $dbc = new PDO ($dns, $params['user'], $params['password']);
        return $dbc;
    }
}