<?php
require_once('../utils/autoloader.php');
require_once '../utils/is-connected.php';

if (!isset($_SESSION['quizz']) || !isset($_SESSION['numero_question'])) {
    header('Location: ../public/themes.php?error=1');
    return;
}




// var_dump($_SESSION['quizz']->getQuestions()[0]->getReponses());
$reponses = $_SESSION['quizz']->getQuestions()[$_SESSION['numero_question']]->getReponses();
$intitule = $_SESSION['quizz']->getQuestions()[$_SESSION['numero_question']]->getIntitule();
$couleurs = ['bg-[#377AFF]', 'bg-[#F75455]', 'bg-[#FF981F]', 'bg-[#12D18E]'];




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/styles/output.css">
    <script src="./assets/scripts/buttonNext.js" defer></script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Manrope:wght@200..800&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Rokkitt:ital,wght@0,100..900;1,100..900&family=Varela+Round&display=swap");
    </style>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sriracha&family=Style+Script&display=swap');
    </style>
</head>

<body class="bg-[#F4F1DE] py-4 px-4">
    <header class="flex items-center justify-between">
        <h2 class="font-[Roboto] text-3xl"><?= $_SESSION['numero_question'] + 1 ?>/<?= count($_SESSION['quizz']->getQuestions()) ?></h2>
        <img class="w-50" src="./assets/imgs/logo_site.png" alt="logo du site">
        <div></div>
    </header>

    <main class="flex flex-col items-center gap-8">
        <img class="h-75 w-9/10 rounded-xl shadow object-cover" src="./assets/imgs/naruto_photo.jpg" alt="Image de Naruto">
        <h1 class="font-[Roboto] text-[22px] lg:text-[28px] xl:text-3xl text-center"><?= $intitule ?></h1>

        <div class="w-9/10 h-[0.5px] bg-[#5D5945]/40 "></div>

        <form method="post" action="../process/inter-question.php" class="flex flex-wrap text-[20px] text-center gap-6 w-9/10 xl:text-2xl justify-between">
            <?php foreach ($reponses as $index => $reponse) { ?>
                <?php $couleur = $couleurs[$index]; ?>


                <div class="w-45/100 h-30 ">
                    <input type="radio" class="peer hidden" name="reponse" id="<?= $reponse->getId() ?>" value="<?= $reponse->getId() ?>">
                    <label for="<?= $reponse->getId() ?>" class="<?= $couleur ?> h-full flex items-center justify-center rounded-xl shadow peer-checked:bg-black">
                        <p class="font-[Roboto] text-white"><?= $reponse->getDescription() ?></p>
                    </label>
                </div>


            <?php } ?>

            <button id="buttonNext" type="submit" class="bg-[#F4F1DE] fixed bottom-0 left-1/2 -translate-x-1/2 w-full  justify-center py-5 hidden">
                <div class="bg-[#377AFF] w-9/10 py-2 flex items-center justify-center rounded-full shadow">
                    <p class="font-[Roboto] text-white">Suivant</p>
                </div>
            </button>
        </form>
    </main>

</body>

</html>