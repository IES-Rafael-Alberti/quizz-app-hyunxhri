<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Quiz - Parte 2</title>
  <link rel="stylesheet" href="quiz.css">
</head>

<body>
  <form method="post">
    <h1>PHP Quiz - Parte 2</h1>

    <?php
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
</body>

</html>
