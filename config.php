<?php
    //Enter your database connection details here.
    $host = 'localhost'; //HOST NAME.
    $db_name = 'todolist'; //Database Name
    $db_username = 'phpmyadmin'; //Database Username
    $db_password = 'root'; //Database Password

    try
    {
        //$pdo = new PDO('mysql:host='. $host .';dbname='.$db_name, $db_username, $db_password);
        $conn = new mysqli($host, $db_username, $db_password, $db_name);
    }
    catch (PDOException $e)
    {
        exit('Error Connecting To DataBase');
    }
?>