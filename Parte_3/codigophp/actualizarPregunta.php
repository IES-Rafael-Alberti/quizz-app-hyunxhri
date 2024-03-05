<?php
$servername = "db";
$username = "root";
$password = "pestillo";
$database = "quizz";

try {
    $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id_pregunta = $_POST['id_pregunta'];
    $pregunta = $_POST['pregunta'];
    $opcion_a = $_POST['opcion_a'];
    $opcion_b = $_POST['opcion_b'];
    $opcion_c = $_POST['opcion_c'];
    $opcion_d = $_POST['opcion_d'];
    $correcta = $_POST['correcta'];
    $question_type = $_POST['question_type'];
    $question_details = $_POST['question_details'];

    $query = "UPDATE questions SET 
              question_text = :pregunta,
              option_a = :opcion_a,
              option_b = :opcion_b,
              option_c = :opcion_c,
              option_d = :opcion_d,
              correct_option = :correcta,
              question_type = :question_type,
              question_details = :question_details
              WHERE id = :id_pregunta";
    $statement = $connection->prepare($query);
    $statement->bindParam(':id_pregunta', $id_pregunta);
    $statement->bindParam(':pregunta', $pregunta);
    $statement->bindParam(':opcion_a', $opcion_a);
    $statement->bindParam(':opcion_b', $opcion_b);
    $statement->bindParam(':opcion_c', $opcion_c);
    $statement->bindParam(':opcion_d', $opcion_d);
    $statement->bindParam(':correcta', $correcta);
    $statement->bindParam(':question_type', $question_type);
    $statement->bindParam(':question_details', $question_details);
    $statement->execute();

    if ($statement->rowCount() > 0) {
        echo "La pregunta se ha actualizado correctamente.";
    } else {
        echo "La pregunta no existe y por ello no se puede editar.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$connection = null;
?>
