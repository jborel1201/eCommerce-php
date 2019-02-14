<?php

include 'config.php';

class Connexion
{

    static $cnx;


    static function getConnection()
    {
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

        return static::$cnx = new PDO(DSN, DB_USER, DB_PASS, $options);


    }

   static function closeConnection(){

       static::$cnx = null;
   }

}