<?php

class Db
{
    public static function getConnection()
    {
        // запрос к БД
//        $host = 'localhost';
//        $dbname = 'public_news';
//        $user = 'root';
//        $password = 'root';
//        $db = new PDO("mysql:dbname=$dbname;host=$host", $user, $password);

        $paramsPath = ROOT . '/config/db_params.php';
        $params = include($paramsPath);

        $dsn = "mysql:dbname={$params['dbname']};host={$params['host']}";
        $db = new PDO($dsn, $params['user'], $params['password']);

        return $db;
    }
}