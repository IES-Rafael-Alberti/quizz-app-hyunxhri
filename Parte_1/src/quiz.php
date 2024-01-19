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
        }
    }
    ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <h1>PHP Quiz</h1>
        <!-- Question 1 -->
        <div class="question">
            <p>1. ¿Qué significa PHP?</p>
            <label><input type="radio" name="q1" value="a"> a)Página de inicio personal</label>
            <label><input type="radio" name="q1" value="b"> b) PHP: Procesador de hipertexto (Respuesta correcta)</label>
            <label><input type="radio" name="q1" value="c"> c) Procesador de hipervínculos privados</label>
            <label><input type="radio" name="q1" value="d"> d) Página de enlace PHP</label>
        </div>

        <!-- Question 2 -->
        <div class="question">
            <p>2. ¿Cuál de los siguientes NO es un tipo de dato de PHP?</p>
            <label><input type="radio" name="q2" value="a"> a) Entero</label>
            <label><input type="radio" name="q2" value="b"> b) Booleano</label>
            <label><input type="radio" name="q2" value="c"> c) Caracter (Respuesta correcta)</label>
            <label><input type="radio" name="q2" value="d"> d) Flotante</label>
        </div>

        <!-- Question 3-->
        <div class="question">
            <p>3. ¿Cuál es el resultado de `echo "Hola" . " " . "Mundo";`?</p>
            <label><input type="radio" name="q3" value="a"> a) HelloWorld</label>
            <label><input type="radio" name="q3" value="b"> b) Hola Mundo (Respuesta correcta)</label>
            <label><input type="radio" name="q3" value="c"> c) HelloWorld</label>
            <label><input type="radio" name="q3" value="d"> d) "Hola Mundo"</label>
        </div>

        <!-- Question 4-->
        <div class="question">
            <p>4. En PHP, ¿qué bucle se utiliza para ejecutar un bloque de código un número especificado de veces?</p>
            <label><input type="radio" name="q4" value="a"> a) Bucle for (Respuesta correcta)</label>
            <label><input type="radio" name="q4" value="b"> b) Bucle while</label>
            <label><input type="radio" name="q4" value="c"> c) Bucle do...while</label>
            <label><input type="radio" name="q4" value="d"> d) Bucle foreach</label>
        </div>

        <!-- Question 5-->
        <div class="question">
            <p>5. ¿Qué función de PHP se utiliza para abrir un archivo para escritura?</p>
            <label><input type="radio" name="q5" value="a"> a) fopen</label>
            <label><input type="radio" name="q5" value="b"> b) file_open</label>
            <label><input type="radio" name="q5" value="c"> c) open_file</label>
            <label><input type="radio" name="q5" value="d"> d) Ninguna de las anteriores (Respuesta correcta)</label>

        </div>

        <!-- Question 6-->
        <div class="question">
            <p>6. ¿Cuál es el propósito de la superglobal `$_GET` en PHP?</p>
            <label><input type="radio" name="q6" value="a"> a) Recuperar datos de un formulario con el método POST</label>
            <label><input type="radio" name="q6" value="b"> b) Almacenar variables de sesión</label>
            <label><input type="radio" name="q6" value="c"> c) Recuperar datos de la cadena de consulta URL (Respuesta correcta)</label>
            <label><input type="radio" name="q6" value="d"> d) Definir constantes globales</label>
        </div>

        <!-- Question 7-->
        <div class="question">
            <p>7. ¿Cuál de los siguientes es un ejemplo de constante mágica de PHP?</p>
            <label><input type="radio" name="q7" value="a"> a) $this</label>
            <label><input type="radio" name="q7" value="b"> b) __LINE__ (Respuesta correcta)</label>
            <label><input type="radio" name="q7" value="c"> c) $var</label>
            <label><input type="radio" name="q7" value="d"> d) functionName()</label>
        </div>

        <!-- Question 8-->
        <div class="question">
            <p>8. ¿Qué hace la función `include` en PHP?</p>
            <label><input type="radio" name="q8" value="a"> a) Ejecuta un bloque de código solo si una condición es verdadera</label>
            <label><input type="radio" name="q8" value="b"> b) Incluye y evalúa un archivo especificado (Respuesta correcta)</label>
            <label><input type="radio" name="q8" value="c"> c) Define una nueva función</label>
            <label><input type="radio" name="q8" value="d"> d) Genera un número aleatorio</label>
        </div>

        <!-- Question 9-->
        <div class="question">
            <p>9. ¿En PHP, qué comprueba el operador `===`?</p>
            <label><input type="radio" name="q9" value="a"> a) Igualdad (Respuesta correcta)</label>
            <label><input type="radio" name="q9" value="b"> b) Asignación</label>
            <label><input type="radio" name="q9" value="c"> c) Desigualdad</label>
            <label><input type="radio" name="q9" value="d"> d) Comparación</label>
        </div>

        <!-- Question 10-->
        <div class="question">
            <p>10. ¿Cuál de los siguientes se utiliza para crear un objeto en PHP?</p>
            <label><input type="radio" name="q10" value="a"> a) new (Respuesta correcta)</label>
            <label><input type="radio" name="q10" value="b"> b) objeto</label>
            <label><input type="radio" name="q10" value="c"> c) crear</label>
            <label><input type="radio" name="q10" value="d"> d) instancia</label>
        </div>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
