<?php
ob_start();
include __DIR__.'/../templates/common/header.php';
$view_header = ob_get_clean();
ob_start();
include __DIR__.'/../templates/common/footer.php';
$view_footer = ob_get_clean();
ob_start();
include __DIR__.'/../templates/question/new_show_question.php';
$view_main = ob_get_clean();
include __DIR__.'/../templates/base.php';