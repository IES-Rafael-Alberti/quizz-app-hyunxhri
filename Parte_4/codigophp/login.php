<?php
session_start(); 

if (isset($_POST["Login"])) {
    $servername = "db";
    $username = "root";
    $password = "pestillo";
    $database = "quizz";

    try {
        $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $username = $_POST["username"];
        $password = $_POST["password"];

        $queryUsuario = "SELECT `username`, `password` FROM `user` WHERE `username` = ?";
        $statementUsuario = $connection->prepare($queryUsuario);
        $statementUsuario->execute([$username]);

        if ($row = $statementUsuario->fetch(PDO::FETCH_ASSOC)) {
            if (password_verify($password, $row["password"])) {
                $_SESSION["username"] = $username;
                header("Location: http://localhost/");
                exit();
            } else {
                echo "<p>Contraseña incorrecta</p>";
            } 
        } else {
            echo "<p>Usuario incorrecto</p>";
        } 
    } catch (PDOException $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    } finally {
        $connection = null;
    }
}
?>
