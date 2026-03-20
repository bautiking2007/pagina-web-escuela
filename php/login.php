<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST"){
        require "connection.php";

        $dni = $_POST["dni"];
        $password = $_POST["password"];

        try{
            $sql = $conn->prepare("SELECT * FROM usuarios WHERE dni = ?");
            $sql->execute([$dni]);
            $fetch = $sql->fetch(PDO::FETCH_ASSOC);

            if ($fetch && password_verify($password, $fetch["password"])){
                // Sesiones
                header("Location: ../dashboard.html");
            }
            else{
                echo "<script>alert('Los datos son incorrectos.');
                window.location.href = '../login.php';
                </script>";
            }
        }
        catch (PDOException $e){
            die("Error de conexión: $e");
        }
    }
?>