<?php
class Quizz {
    private $questions;

    public function __construct()
    {
        // Inicializa las preguntas y respuestas
        $this->initializeQuestions();
    }

    private function initializeQuestions()
    {
        // Define las preguntas y respuestas correctas
        $this->questions = array(
            "q1" => "b",
            "q2" => "c",
            "q3" => "b",
            "q4" => "a",
            "q5" => "d",
            "q6" => "c",
            "q7" => "b",
            "q8" => "b",
            "q9" => "a",
            "q10" => "a"
        );
    }

    public function getQuestion($questionNumber)
    {
        // Retorna la pregunta asociada al número proporcionado
        return $this->questions["q$questionNumber"];
    }

    public function calculateScore($userAnswers)
    {
        // Calcula la puntuación basada en las respuestas del usuario
        $score = 0;

        foreach ($this->questions as $questionNumber => $correctAnswer) {
            if (isset($userAnswers[$questionNumber]) && $userAnswers[$questionNumber] === $correctAnswer) {
                $score++;
            }
        }

        return $score;
    }
}

?>