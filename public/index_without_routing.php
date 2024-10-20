<?php

namespace kenzo\Jeu20\App;

use kenzo\Jeu20\Controller\QuestionController;

require_once '../src/Utils/autoloaders.php';

spl_autoload_register('kenzo\Jeu20\Utils\myAutoloadingWithPrefix');

define("BASE_VIEW_PATH", dirname(__DIR__) . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR);

(new QuestionController())->showSimpleQuestion(1);