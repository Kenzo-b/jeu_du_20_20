<?php
use kenzo\Jeu20\Utils\ViewRender;

$view_header = ViewRender::getContentView("common/header");
$view_main = ViewRender::getContentView("question/new_show_question");
$view_footer = ViewRender::getContentView("common/footer");
include ViewRender::getValidatedViewPath('base');