<?php

namespace kenzo\Jeu20\App;

use kenzo\Jeu20\Entity\Question;
use kenzo\Jeu20\Entity\Answer;

require_once "../src/Entity/Answer.php";
require_once "../src/Entity/Question.php";

$test = new Question(3, "tchoin", null, null , false, new \DateTimeImmutable(), null);
$test2 = new Answer("test", null, null , false, new \DateTimeImmutable(), null);

echo $test2;