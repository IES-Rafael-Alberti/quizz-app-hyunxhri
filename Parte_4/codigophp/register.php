<?php
    if (isset($_POST["Registro"])) {
        $servername = "db";
        $username = "root";
        $password = "pestillo";
        $database = "quizz";

        try {
        $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];

        if (empty($email)) {
            $email = null;
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $queryUsuario = "INSERT INTO `user` (`username`, `password`, `email`) VALUES ('$username', '$hashed_password', '$email')";
        $statementUsuario = $connection->prepare($queryUsuario);
        $statementUsuario->execute();

        echo "<p>Usuario registrado</p>";
        } catch (PDOException $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
        } finally {
        $connection = null;
        }
    }
?>