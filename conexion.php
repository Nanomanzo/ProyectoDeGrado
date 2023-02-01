<?php
    // Dirección y puerto del servidor donde se encuentra la base de datos
    $server = "localhost:3307";
    //variables para conectarse a la base de datos
    $username = 'root';
    $password = '';
    $database = 'proyectogrado';

    try {
        // Utilizando la clase PDO y pasando como argumento la cadena de conexión, el nombre de usuario y la contraseña
        $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
    } catch (PDOException $e) {
        // Si la conexión falla, mostramos un mensaje de error
        die('Coneccion fallida: ' . $e->getMessage());
    }

?>