<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST"){
        require "connection.php";

        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $dni = $_POST["dni"];
        $direccion = $_POST["direccion"];
        $antecedentes_medicos = $_POST["antecedentesMedicos"];
        $tel_linea = $_POST["tel_linea"];
        $tel_fijo = $_POST["tel_fijo"];
        $password = $_POST["password"];
        $email = $_POST["email"];

        $password = password_hash($password, PASSWORD_BCRYPT);
        try{
            $sql = $conn->prepare("INSERT INTO usuarios(nombre, apellido, dni, direccion, antecedentes_medicos, tel_linea, tel_fijo, password, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $sql->execute([$nombre, $apellido, $dni, $direccion, $antecedentes_medicos, $tel_linea, $tel_fijo, $password, $email]);
            echo "<script>alert('Cuenta creada con éxito.');
            window.location.href = '../login.php';
            </script>";
        }
        catch (PDOException $e){
            echo "<script>alert('Esa cuenta ya existe.');
            window.location.href = '../register.html';
            </script>";
        }
        exit();
    }
?>