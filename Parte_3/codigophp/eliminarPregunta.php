<?php
$servername = "db";
$username = "root";
$password = "pestillo";
$database = "quizz";

try {
    $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id_pregunta = $_POST['id_pregunta'];

    $query = "DELETE FROM questions WHERE question_id = :id_pregunta";
    $statement = $connection->prepare($query);
    $statement->bindParam(':id_pregunta', $id_pregunta);
    $statement->execute();

    if ($statement->rowCount() > 0) {
        echo "La pregunta se ha eliminado correctamente.";
    } else {
        echo "La pregunta no existe.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$connection = null;
?>
