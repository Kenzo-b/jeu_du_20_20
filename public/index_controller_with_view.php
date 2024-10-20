<?php

namespace kenzo\Jeu20\App;

require_once '../src/Utils/autoloaders.php';

spl_autoload_register('kenzo\Jeu20\Utils\myAutoloadingWithPrefix');

use kenzo\Jeu20\Controller\QuestionController;

session_start();

if (isset($_POST['answer'])) {
    QuestionController::isValidAnswer();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}



(new QuestionController())->showQuestionWithRenderView($_SESSION['level']);

print_r($_SESSION);