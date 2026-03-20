<?php
    /*
        CREATE DATABASE escuela;
        CREATE TABLE usuarios(id INT AUTO_INCREMENT PRIMARY KEY, nombre VARCHAR(100) NOT NULL, apellido VARCHAR(100) NOT NULL, dni INT NOT NULL, direccion TEXT NOT NULL, antecedentes_medicos TEXT NOT NULL, tel_linea INT NOT NULL, tel_fijo INT, password TEXT NOT NULL, email TEXT NOT NULL);
    */

    $host = "127.0.0.1";
    $port = 3306;
    $database = "escuela";
    $user = "root";
    $pass = "";

    try{
        $conn = new PDO("mysql:host=$host:$port;dbname=$database", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e){
        die("Error de conexión a la base de datos: $e");
    }
?>