<?php

namespace kenzo\Jeu20\App;

use kenzo\Jeu20\Entity\Answer;
use kenzo\Jeu20\Entity\Question;

require_once '../src/Utils/autoloaders.php';

spl_autoload_register('kenzo\Jeu20\Utils\myAutoloadingWithPrefix');

$test = new Question(3, "test", null, null , false, new \DateTimeImmutable(), null);
$test2 = new Answer("test", null, null , false, new \DateTimeImmutable(), null);

echo $test2;