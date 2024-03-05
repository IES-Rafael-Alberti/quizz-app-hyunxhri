<?php
// Establecer conexión a la base de datos
$servername = "db";
$username = "root";
$password = "pestillo";
$database = "quizz";

try {
    $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Paginación
    $preguntasPorPagina = 5; // Cantidad de preguntas por página
    $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
    $offset = ($paginaActual - 1) * $preguntasPorPagina;

    // Obtener total de preguntas
    $queryTotal = "SELECT COUNT(*) as total FROM questions WHERE quiz_id = 1";
    $statementTotal = $connection->query($queryTotal);
    $totalPreguntas = $statementTotal->fetch(PDO::FETCH_ASSOC)['total'];
    $totalPaginas = ceil($totalPreguntas / $preguntasPorPagina);

    // Obtener preguntas para la página actual
    $query = "SELECT * FROM questions WHERE quiz_id = 1 LIMIT $preguntasPorPagina OFFSET $offset";
    $statement = $connection->query($query);

    // Mostrar preguntas
    echo "<h2>Preguntas del cuestionario</h2>";
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        echo "<div class='question'>";
        echo "<p>" . $row["question_text"] . "</p>";
        echo "<ul>";
        echo "<li>a) " . $row["option_a"] . "</li>";
        echo "<li>b) " . $row["option_b"] . "</li>";
        echo "<li>c) " . $row["option_c"] . "</li>";
        echo "<li>d) " . $row["option_d"] . "</li>";
        echo "<li>Respuesta correcta: " . $row["correct_option"] . "</li>";
        echo "</ul>";
        echo "</div>";
    }

    // Mostrar links de paginación
    echo "<div class='pagination'>";
    for ($i = 1; $i <= $totalPaginas; $i++) {
        echo "<a href='?pagina=$i'>$i</a>";
    }
    echo "</div>";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$connection = null;
?>
