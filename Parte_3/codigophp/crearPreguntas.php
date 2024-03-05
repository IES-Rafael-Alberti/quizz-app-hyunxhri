<?php
$servername = "db";
$username = "root";
$password = "pestillo";
$database = "quizz";

try {
    $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pregunta = $_POST['pregunta'];
    $opcion_a = $_POST['opcion_a'];
    $opcion_b = $_POST['opcion_b'];
    $opcion_c = $_POST['opcion_c'];
    $opcion_d = $_POST['opcion_d'];
    $correcta = $_POST['correcta'];
    $question_type = $_POST['question_type'];
    $question_details = $_POST['question_details'];

    $query = "INSERT INTO questions (question_text, option_a, option_b, option_c, option_d, correct_option, question_type, question_details, quiz_id) 
    VALUES (:pregunta, :opcion_a, :opcion_b, :opcion_c, :opcion_d, :correcta, :question_type, :question_details, 1)";
    $statement = $connection->prepare($query);
    $statement->bindParam(':pregunta', $pregunta);
    $statement->bindParam(':opcion_a', $opcion_a);
    $statement->bindParam(':opcion_b', $opcion_b);
    $statement->bindParam(':opcion_c', $opcion_c);
    $statement->bindParam(':opcion_d', $opcion_d);
    $statement->bindParam(':correcta', $correcta);
    $statement->bindParam(':question_type', $correcta);
    $statement->bindParam(':question_details', $correcta);
    $statement->execute();

    echo "La pregunta se ha agregado correctamente.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$connection = null;
?>
