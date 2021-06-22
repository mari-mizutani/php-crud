<?php
declare(strict_types=1);

//setting database connection
class Database
{

    public static function openConnection(): PDO
    {

        $dbhost = "localhost";
        $dbuser = "becode";
        $dbpass = "becode";
        $db = "school";

        $driverOptions = [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",//Command to execute when connecting to the MySQL server. Will automatically be re-executed when reconnecting.
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        return new PDO('mysql:host=' . $dbhost . ';dbname=' . $db, $dbuser, $dbpass, $driverOptions);
    }
}


