<?php

namespace kenzo\Jeu20\Controller;

class BaseController
{
    public static function renderViewTemp(
        string $viewDefinition,
        array $data = []
    ): void {
        extract($data);
        include __DIR__.'/../../viewDefinitions/'.$viewDefinition.'.php';
    }
}