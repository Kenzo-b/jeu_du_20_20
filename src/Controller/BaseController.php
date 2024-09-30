<?php

namespace kenzo\Jeu20\Controller;

use kenzo\Jeu20\utils\ViewRender;

class BaseController
{

    public static function renderFromViewDefinition(string $viewDefinition, $data = []): void
    {
        ViewRender::setData($data);
        ViewRender::renderFromViewDefinition($viewDefinition);
    }
}