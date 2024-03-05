<?php
  session_start();

  if (isset($_GET["logout"])) {
    session_destroy();
    header("Location: index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Quiz - Parte 4</title>
  <link rel="stylesheet" href="quiz4.css">
</head>

<body>
  <form method="post">
    <h1>PHP Quiz - Parte 4</h1>

    <?php
      if (isset($_SESSION["username"])) {
        echo "<p>Usuario: " . $_SESSION["username"] . "</p>";
      } else {
        echo "<p>Usuario: Invitado</p>";
      }

      if (isset($_SESSION["username"])) {
        echo "<p><a href='?logout=true'>Cerrar sesión</a></p>";
      }


      $servername = "db";
      $username = "root";
      $password = "pestillo";
      $database = "quizz";

      try {
        $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $query = "SELECT * FROM `questions` WHERE `quiz_id` = 1";
        $statement = $connection->prepare($query);
        $statement->execute();

        $i = 1;
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
          echo "<div class='question'>";
            echo "<p>$i. " . $row["question_text"] . "</p>";
            echo "<label><input type='radio' name='q$i' value='a'> a) " . $row["option_a"] . "</label>";
            echo "<label><input type='radio' name='q$i' value='b'> b) " . $row["option_b"] . "</label>";
            echo "<label><input type='radio' name='q$i' value='c'> c) " . $row["option_c"] . "</label>";
            echo "<label><input type='radio' name='q$i' value='d'> d) " . $row["option_d"] . "</label>";
          echo "</div>";
          $i++;
        }
      } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
    ?>
    <input type="submit" value="Submit">
    <a href="?retake=true">Reintentar</a>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            $score = 0;
            $NUMERO_DE_PREGUNTAS = 10;
            $respondidas = 0;
            
            for ($i = 1; $i <= $NUMERO_DE_PREGUNTAS; $i++) {
                if(isset($_POST["q$i"]) && !empty($_POST["q$i"])) {
                    $respondidas++;
                    $user_answer = $_POST["q$i"];
                    
                    $query = "SELECT correct_option FROM questions WHERE quiz_id = 1 AND question_id = $i";
                    $statement = $connection->prepare($query);
                    $statement->execute();
                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                    $correct_answer = $row['correct_option']; 
                    
                    if ($user_answer == $correct_answer) {
                        $score++; 
                    }
                }
            }

            echo "</br></br>";
            if($respondidas < $NUMERO_DE_PREGUNTAS) {
                echo "<h1 style='background:red;'>¡Debes responder todas las preguntas!</h1>";
            } else {
                echo "<h1>Tu puntaje final es: $score de " . $NUMERO_DE_PREGUNTAS . "</h1>";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    $connection = null; 
  ?>
  </form>

  <form action="crearPreguntas.php" method="post">
  <h1>Agregar nueva pregunta</h1>

    <label class="labelcreap" for="pregunta">Pregunta:</label>
    <input class="inputcreap" type="text" id="pregunta" name="pregunta" required><br>
    <label class="labelcreap" for="opcion_a">Opción A:</label>
    <input class="inputcreap" type="text" id="opcion_a" name="opcion_a" required><br>
    <label class="labelcreap" for="opcion_b">Opción B:</label>
    <input class="inputcreap" type="text" id="opcion_b" name="opcion_b" required><br>
    <label class="labelcreap" for="opcion_c">Opción C:</label>
    <input class="inputcreap" type="text" id="opcion_c" name="opcion_c" required><br>
    <label class="labelcreap" for="opcion_d">Opción D:</label>
    <input class="inputcreap" type="text" id="opcion_d" name="opcion_d" required><br>
    <label class="labelcreap" for="correcta">Respuesta correcta (a, b, c, o d):</label>
    <input class="inputcreap" type="text" id="correcta" name="correcta"><br>
    <label class="labelcreap" for="correcta">Tipo de pregunta:</label>
    <input class="inputcreap" type="text" id="question_type" name="question_type" required><br>
    <label class="labelcreap" for="correcta">Detalles pregunta:</label>
    <input class="inputcreap" type="text" id="question_details" name="question_details" required><br><br>
    <input type="submit" value="Agregar pregunta">
  </form>

    <form action="leerPreguntas.php" method="post">
    <h1>Leer preguntas</h1>
    <br>
      <input type="submit" value="Submit" name="Leer">
    </form>

    <form action="actualizarPregunta.php" method="post">
    <h1>Actualizar pregunta</h1>
        <label class="labelcreap" for="id_pregunta">ID de la pregunta a actualizar:</label>
        <input class="inputcreap" type="text" id="id_pregunta" name="id_pregunta" required><br>
        <label class="labelcreap" for="pregunta">Nueva pregunta:</label>
        <input class="inputcreap" type="text" id="pregunta" name="pregunta" required><br>
        <label class="labelcreap" for="opcion_a">Nueva Opción A:</label>
        <input class="inputcreap" type="text" id="opcion_a" name="opcion_a" required><br>
        <label class="labelcreap" for="opcion_b">Nueva Opción B:</label>
        <input class="inputcreap" type="text" id="opcion_b" name="opcion_b" required><br>
        <label class="labelcreap" for="opcion_c">Nueva Opción C:</label>
        <input class="inputcreap" type="text" id="opcion_c" name="opcion_c" required><br>
        <label class="labelcreap" for="opcion_d">Nueva Opción D:</label>
        <input class="inputcreap" type="text" id="opcion_d" name="opcion_d" required><br>
        <label class="labelcreap" for="correcta">Nueva Respuesta correcta (a, b, c, o d):</label>
        <input class="inputcreap" type="text" id="correcta" name="correcta" required><br>
        <label class="labelcreap" for="question_type">Nuevo Tipo de pregunta:</label>
        <input class="inputcreap" type="text" id="question_type" name="question_type" required><br>
        <label class="labelcreap" for="question_details">Nuevos Detalles pregunta:</label>
        <input class="inputcreap" type="text" id="question_details" name="question_details" required><br><br>
        <input type="submit" value="Actualizar pregunta">
    </form>

    <form action="eliminarPregunta.php" method="post">
    <h1>Eliminar pregunta</h1>
        <label class="labelcreap" for="id_pregunta">ID de la pregunta a eliminar:</label>
        <input class="inputcreap" type="text" id="id_pregunta" name="id_pregunta"><br><br>
        <input type="submit" value="Eliminar pregunta">
    </form>

      <form action="login.php" method="post" class="login">
        <h1>Login Usuario</h1>
        <br>

          <input type="text" name="username" placeholder="Username" required>
          <input type="password" name="password" placeholder="Password"required><br><br>
          <input type="submit" value="Login" name="Login">
        </form>
      </div>
      <div class="register">
        <form action="register.php" method="post" class="registro">
          <h2>Registrarse</h2>
          <br>
          <input type="text" name="username" placeholder="Username" required>
          <input type="text" name="password" placeholder="Password" required>
          <input type="email" name="email" placeholder="Email"><br><br>
          <input type="submit" value="Registro" name="Registro" required>
        </form>
      </div>
</body>

</html>
