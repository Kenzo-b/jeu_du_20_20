<?php
use kenzo\Jeu20\Utils\ViewRender;

$view_header = ViewRender::getContentView("common/header");
$view_main = ViewRender::getContentView("question/new_show_question");
$view_footer = ViewRender::getContentView("common/footer");
$cssFiles = ViewRender::getCssLinks(["style"]);
$jsFiles = ViewRender::getJsScripts([]);
include ViewRender::getValidatedViewPath('base');