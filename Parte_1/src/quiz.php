<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Quiz</title>
    <link rel="stylesheet" href="quiz.css">
</head>
<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $questions = array("q1", "q2", "q3", "q4", "q5", "q6", "q7", "q8", "q9", "q10");
            $allQuestionsAnswered = true;

            foreach ($questions as $question) {
                if (empty($_POST[$question])) {
                    $allQuestionsAnswered = false;
                    break;
                } 
            }

            if (!$allQuestionsAnswered) {
                echo '<h1 class="error">Por favor, responda todas las preguntas.</h1>';
            } else {
                //Calculate the score.
                include 'Quizz.php';
                $quiz = new Quizz();
                $userAnswers = $_POST;
                $score = $quiz->calculateScore($userAnswers);
                echo "<h2>Tu puntuación es: $score/10</h2>";
            }
        }
    ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <h1>PHP Quiz</h1>
        <!-- Question 1 -->
        <div class="question">
            <p>1. ¿Qué significa PHP?</p>
            <label><input type="radio" name="q1" value="a" <?php echo (isset($_POST['q1']) && $_POST['q1'] == 'a') ? 'checked' : ''; ?>> a)Página de inicio personal</label>
            <label><input type="radio" name="q1" value="b" <?php echo (isset($_POST['q1']) == "POST" && $_POST['q1'] == 'b') ? 'checked' : ''; ?>> b) PHP: Procesador de hipertexto (Respuesta correcta)</label>
            <label><input type="radio" name="q1" value="c" <?php echo (isset($_POST['q1']) == "POST" && $_POST['q1'] == 'c') ? 'checked' : ''; ?>> c) Procesador de hipervínculos privados</label>
            <label><input type="radio" name="q1" value="d" <?php echo (isset($_POST['q1']) == "POST" && $_POST['q1'] == 'd') ? 'checked' : ''; ?>> d) Página de enlace PHP</label>
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $allQuestionsAnswered) : ?>
                <p class="feedback">La respuesta correcta es: PHP: Procesador de hipertexto.</p>
            <?php endif; ?>
            </div>

        <!-- Question 2 -->
        <div class="question">
            <p>2. ¿Cuál de los siguientes NO es un tipo de dato de PHP?</p>
            <label><input type="radio" name="q2" value="a" <?php echo (isset($_POST['q2']) && $_POST['q2'] == 'a') ? 'checked' : ''; ?>> a) Entero</label>
            <label><input type="radio" name="q2" value="b" <?php echo (isset($_POST['q2']) && $_POST['q2'] == 'b') ? 'checked' : ''; ?>> b) Booleano</label>
            <label><input type="radio" name="q2" value="c" <?php echo (isset($_POST['q2']) && $_POST['q2'] == 'c') ? 'checked' : ''; ?>> c) Caracter (Respuesta correcta)</label>
            <label><input type="radio" name="q2" value="d" <?php echo (isset($_POST['q2']) && $_POST['q2'] == 'd') ? 'checked' : ''; ?>> d) Flotante</label>
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $allQuestionsAnswered) : ?>
                <p class="feedback">La respuesta correcta es: Caracter.</p>
            <?php endif; ?>
            </div>

        <!-- Question 3-->
        <div class="question">
            <p>3. ¿Cuál es el resultado de `echo "Hola" . " " . "Mundo";`?</p>
            <label><input type="radio" name="q3" value="a" <?php echo (isset($_POST['q3']) && $_POST['q3'] == 'a') ? 'checked' : ''; ?>> a) HelloWorld</label>
            <label><input type="radio" name="q3" value="b" <?php echo (isset($_POST['q3']) && $_POST['q3']  == 'b') ? 'checked' : ''; ?>> b) Hola Mundo (Respuesta correcta)</label>
            <label><input type="radio" name="q3" value="c" <?php echo (isset($_POST['q3']) && $_POST['q3']  == 'c') ? 'checked' : ''; ?>> c) HelloWorld</label>
            <label><input type="radio" name="q3" value="d" <?php echo (isset($_POST['q3']) && $_POST['q3']  == 'd') ? 'checked' : ''; ?>> d) "Hola Mundo"</label>
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $allQuestionsAnswered) : ?>
                <p class="feedback">La respuesta correcta es: "Hola Mundo".</p>
            <?php endif; ?>
            </div>

        <!-- Question 4-->
        <div class="question">
            <p>4. En PHP, ¿qué bucle se utiliza para ejecutar un bloque de código un número especificado de veces?</p>
            <label><input type="radio" name="q4" value="a" <?php echo (isset($_POST['q4']) && $_POST['q4']  == 'a') ? 'checked' : ''; ?>> a) Bucle for (Respuesta correcta)</label>
            <label><input type="radio" name="q4" value="b" <?php echo (isset($_POST['q4']) && $_POST['q4']  == 'b') ? 'checked' : ''; ?>> b) Bucle while</label>
            <label><input type="radio" name="q4" value="c" <?php echo (isset($_POST['q4']) && $_POST['q4']  == 'c') ? 'checked' : ''; ?>> c) Bucle do...while</label>
            <label><input type="radio" name="q4" value="d" <?php echo (isset($_POST['q4']) && $_POST['q4']  == 'd') ? 'checked' : ''; ?>> d) Bucle foreach</label>
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $allQuestionsAnswered) : ?>
                <p class="feedback">La respuesta correcta es: bucle for.</p>
            <?php endif; ?>
            </div>

        <!-- Question 5-->
        <div class="question">
            <p>5. ¿Qué función de PHP se utiliza para abrir un archivo para escritura?</p>
            <label><input type="radio" name="q5" value="a" <?php echo (isset($_POST['q5']) && $_POST['q5']  == 'a') ? 'checked' : ''; ?>> a) fopen</label>
            <label><input type="radio" name="q5" value="b" <?php echo (isset($_POST['q5']) && $_POST['q5']  == 'b') ? 'checked' : ''; ?>> b) file_open</label>
            <label><input type="radio" name="q5" value="c" <?php echo (isset($_POST['q5']) && $_POST['q5']  == 'c') ? 'checked' : ''; ?>> c) open_file</label>
            <label><input type="radio" name="q5" value="d" <?php echo (isset($_POST['q5']) && $_POST['q5']  == 'd') ? 'checked' : ''; ?>> d) Ninguna de las anteriores (Respuesta correcta)</label>
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $allQuestionsAnswered) : ?>
                <p class="feedback">La respuesta correcta es: Ninguna de las anteriores.</p>
            <?php endif; ?>
            </div>

        <!-- Question 6-->
        <div class="question">
            <p>6. ¿Cuál es el propósito de la superglobal `$_GET` en PHP?</p>
            <label><input type="radio" name="q6" value="a" <?php echo (isset($_POST['q6']) && $_POST['q6']  == 'a') ? 'checked' : ''; ?>> a) Recuperar datos de un formulario con el método POST</label>
            <label><input type="radio" name="q6" value="b" <?php echo (isset($_POST['q6']) && $_POST['q6']  == 'b') ? 'checked' : ''; ?>> b) Almacenar variables de sesión</label>
            <label><input type="radio" name="q6" value="c" <?php echo (isset($_POST['q6']) && $_POST['q6']  == 'c') ? 'checked' : ''; ?>> c) Recuperar datos de la cadena de consulta URL (Respuesta correcta)</label>
            <label><input type="radio" name="q6" value="d" <?php echo (isset($_POST['q6']) && $_POST['q6']  == 'd') ? 'checked' : ''; ?>> d) Definir constantes globales</label>
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $allQuestionsAnswered) : ?>
                <p class="feedback">La respuesta correcta es: Recuperar datos de la cadena de consulta URL.</p>
            <?php endif; ?>
            </div>

        <!-- Question 7-->
        <div class="question">
            <p>7. ¿Cuál de los siguientes es un ejemplo de constante mágica de PHP?</p>
            <label><input type="radio" name="q7" value="a" <?php echo (isset($_POST['q7']) && $_POST['q7']  == 'a') ? 'checked' : ''; ?>> a) $this</label>
            <label><input type="radio" name="q7" value="b" <?php echo (isset($_POST['q7']) && $_POST['q7']  == 'b') ? 'checked' : ''; ?>> b) __LINE__ (Respuesta correcta)</label>
            <label><input type="radio" name="q7" value="c" <?php echo (isset($_POST['q7']) && $_POST['q7']  == 'c') ? 'checked' : ''; ?>> c) $var</label>
            <label><input type="radio" name="q7" value="d" <?php echo (isset($_POST['q7']) && $_POST['q7']  == 'd') ? 'checked' : ''; ?>> d) functionName()</label>
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $allQuestionsAnswered) : ?>
                <p class="feedback">La respuesta correcta es: __LINE__.</p>
            <?php endif; ?>
            </div>

        <!-- Question 8-->
        <div class="question">
            <p>8. ¿Qué hace la función `include` en PHP?</p>
            <label><input type="radio" name="q8" value="a" <?php echo (isset($_POST['q8']) && $_POST['q8']  == 'a') ? 'checked' : ''; ?>> a) Ejecuta un bloque de código solo si una condición es verdadera</label>
            <label><input type="radio" name="q8" value="b" <?php echo (isset($_POST['q8']) && $_POST['q8']  == 'b') ? 'checked' : ''; ?>> b) Incluye y evalúa un archivo especificado (Respuesta correcta)</label>
            <label><input type="radio" name="q8" value="c" <?php echo (isset($_POST['q8']) && $_POST['q8']  == 'c') ? 'checked' : ''; ?>> c) Define una nueva función</label>
            <label><input type="radio" name="q8" value="d" <?php echo (isset($_POST['q8']) && $_POST['q8']  == 'd') ? 'checked' : ''; ?>> d) Genera un número aleatorio</label>
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $allQuestionsAnswered) : ?>
                <p class="feedback">La respuesta correcta es: Incluye y evalúa un archivo especificado.</p>
            <?php endif; ?>
            </div>

        <!-- Question 9-->
        <div class="question">
            <p>9. ¿En PHP, qué comprueba el operador `===`?</p>
            <label><input type="radio" name="q9" value="a" <?php echo (isset($_POST['q9']) && $_POST['q9']  == 'a') ? 'checked' : ''; ?>> a) Igualdad (Respuesta correcta)</label>
            <label><input type="radio" name="q9" value="b" <?php echo (isset($_POST['q9']) && $_POST['q9']  == 'b') ? 'checked' : ''; ?>> b) Asignación</label>
            <label><input type="radio" name="q9" value="c" <?php echo (isset($_POST['q9']) && $_POST['q9']  == 'c') ? 'checked' : ''; ?>> c) Desigualdad</label>
            <label><input type="radio" name="q9" value="d" <?php echo (isset($_POST['q9']) && $_POST['q9']  == 'd') ? 'checked' : ''; ?>> d) Comparación</label>
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $allQuestionsAnswered) : ?>
                <p class="feedback">La respuesta correcta es: Igualdad.</p>
            <?php endif; ?>
            </div>

        <!-- Question 10-->
        <div class="question">
            <p>10. ¿Cuál de los siguientes se utiliza para crear un objeto en PHP?</p>
            <label><input type="radio" name="q10" value="a" <?php echo (isset($_POST['q10']) && $_POST['q10']  == 'a') ? 'checked' : ''; ?>> a) new (Respuesta correcta)</label>
            <label><input type="radio" name="q10" value="b" <?php echo (isset($_POST['q10']) && $_POST['q10']  == 'b') ? 'checked' : ''; ?>> b) objeto</label>
            <label><input type="radio" name="q10" value="c" <?php echo (isset($_POST['q10']) && $_POST['q10']  == 'c') ? 'checked' : ''; ?>> c) crear</label>
            <label><input type="radio" name="q10" value="d" <?php echo (isset($_POST['q10']) && $_POST['q10']  == 'd') ? 'checked' : ''; ?>> d) instancia</label>
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $allQuestionsAnswered) : ?>
                <p class="feedback">La respuesta correcta es: new.</p>
            <?php endif; ?>
            </div>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
