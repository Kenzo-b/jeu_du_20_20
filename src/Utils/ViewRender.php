<?php

namespace kenzo\Jeu20\utils;

class ViewRender
{
    public const string VIEW_DEFINITIONS_DIRECTORY_PATH = '/../../viewDefinitions/';

    public static function getValidatedViewDefinitionPath(string $view): string
    {
        $viewDefinitionToCheck = __DIR__.self::VIEW_DEFINITIONS_DIRECTORY_PATH.$view.'.php';
        if (!file_exists($viewDefinitionToCheck)) {
            throw new \Exception("Le fichier de définition de la vue à rendre n'existe pas : " .$viewDefinitionToCheck);
        }
        return $viewDefinitionToCheck;
    }

    public static function renderFromViewDefinition(string $viewDefinition): void
    {
        $viewDefinitionPath = self::getValidatedViewDefinitionPath($viewDefinition);
        include $viewDefinitionPath;
    }
}