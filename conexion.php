<?php

    $server = "localhost:3307";
    $username = 'root';
    $password = '';
    $database = 'proyectogrado';

    try {
        $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
    } catch (PDOException $e) {
        die('Coneccion fallida: ' . $e->getMessage());
    }

?>