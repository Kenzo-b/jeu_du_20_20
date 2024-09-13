<?php

namespace kenzo\Jeu20\App;

use kenzo\Jeu20\Entity\Answer;
use kenzo\Jeu20\Entity\Question;

require_once '../src/Utils/autoloaders.php';

spl_autoload_register('kenzo\Jeu20\Utils\myAutoloadingWithPrefix');


$test2 = (new Answer())
    ->setContentText('test')
    ->setCreatedAt(new \DateTimeImmutable());


echo $test2;