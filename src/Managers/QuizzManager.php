<?php

class QuizzManager
{

    private QuizzRepository $quizzRepository;
    private QuestionRepository $questionRepository;
    private ReponseRepository $reponseRepository;

    public function __construct(PDO $db)
    {
        $this->quizzRepository = new QuizzRepository($db);
        $this->questionRepository = new QuestionRepository($db);
        $this->reponseRepository = new ReponseRepository($db);
    }

    public function quizzCreation(int $idQuizz)
    {

        $quizz = $this->quizzRepository->findQuizz($idQuizz);
        // var_dump($quizz);
        $questions = $this->questionRepository->findAllQuestionByIdQuizz($idQuizz);
        $quizz->setQuestions($questions);


        foreach ($questions as $key => $question) {
            $reponses = $this->reponseRepository->findAllReponseByIdQuestion($question->getId());
            $question->setReponses($reponses);
        }
        $_SESSION['quizz'] = $quizz;
        $_SESSION['numero_question'] =  0;
        $_SESSION['bonneReponses'] = 0;
    }

    public function nextQuestion(int $idReponse)
    {
        $isCorrecte = $this->reponseRepository->isCorrecteReponse($idReponse);
        
        
        if ($isCorrecte) {
            $_SESSION['bonneReponses']++;
        }

        $_SESSION['numero_question']++;


        if ($_SESSION['numero_question'] >= count($_SESSION['quizz']->getQuestions())) {
            header('Location: ./save-score.php');
        } else {
            header('Location: ../public/questions.php');
        }
    }
}
