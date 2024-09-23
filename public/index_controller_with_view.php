<?php

namespace kenzo\Jeu20\App;

require_once '../src/Utils/autoloaders.php';

spl_autoload_register('kenzo\Jeu20\Utils\myAutoloadingWithPrefix');

use kenzo\Jeu20\Controller\QuestionController;

(new QuestionController())->showQuestionWithRenderView(1);