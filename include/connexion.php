<?php

function dbconnect()
{
    $host = "localhost";
    $dbname = "foodmarket";
    $user = "root";
    $pass = "";

    try {
        $BDH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        return $BDH;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
