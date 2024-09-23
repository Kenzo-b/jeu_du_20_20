<?php

namespace kenzo\Jeu20\Controller;

use kenzo\Jeu20\utils\ViewRender;

class BaseController
{
    public static function renderViewTemp(string $viewDefinition, array $data = []): void
    {
        extract($data);
        include __DIR__.'/../../viewDefinitions/'.$viewDefinition.'.php';
    }

    public static function renderFromViewDefinition(string $viewDefinition, $data = []): void
    {
        ViewRender::setData($data);
        ViewRender::renderFromViewDefinition($viewDefinition);
    }
}