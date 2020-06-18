<?php

class Database
{
    public static function Connect(){
        $db = new mysqli('localhost','root', '', 'proyect');
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}