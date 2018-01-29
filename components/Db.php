<?php

/**
 * Created by PhpStorm.
 * User: Івася
 * Date: 23.07.2017
 * Time: 18:32
 */
class Db
{
    public static function getConnection ()
    {
        $paramPath = ROOT . '/config/db.php';
        $params = include($paramPath);

        $db = new mysqli($params['host'], $params['username'], $params['password'], $params['dbname']);

        return $db;
    }
}