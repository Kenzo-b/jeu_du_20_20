<?php

namespace kenzo\Jeu20\utils;

class ViewRender
{
    public const string VIEW_DIRECTORY_PATH = '/../../templates/';
    public const string VIEW_DEFINITIONS_DIRECTORY_PATH = '/../../viewDefinitions/';
    public const string CSS_DIRECTORY_PATH = '../assets/css/';

    public const string JS_DIRECTORY_PATH = '../assets/js/';

    private static array $data = [];

    public static function setData(array $data):void
    {
        self::$data = $data;
    }

    public static function getValidatedViewDefinitionPath(string $view): string
    {
        $viewDefinitionToCheck = __DIR__.self::VIEW_DEFINITIONS_DIRECTORY_PATH.$view.'.php';
        if (!file_exists($viewDefinitionToCheck)) {
            throw new \Exception("Le fichier de définition de la vue à rendre n'existe pas : " .$viewDefinitionToCheck);
        }
        return $viewDefinitionToCheck;
    }

    public static function getValidatedViewPath(string $view):string
    {
        $viewToCheck = __DIR__.self::VIEW_DIRECTORY_PATH.$view.'.php';
        if (!file_exists($viewToCheck)) {
            throw new \Exception("Le fichier de vue à rendre n'existe pas : ".$viewToCheck);
        }
        return $viewToCheck;
    }

    public static function renderFromViewDefinition(string $viewDefinition): void
    {
        $viewDefinitionPath = self::getValidatedViewDefinitionPath($viewDefinition);
        extract(self::$data);
        include $viewDefinitionPath;
    }

    public static function getContentView(string $view): string
    {
        $viewPath = self::getValidatedViewPath($view);
        extract(self::$data);
        ob_start();
        include $viewPath;
        return ob_get_clean();
    }

    private static function buildPathToCssFilename(string $cssFilename): string
    {
        return self::CSS_DIRECTORY_PATH.$cssFilename.'.css';
    }

    private static function buildPathToJsFilename(string $jsFilename): string
    {
        return self::JS_DIRECTORY_PATH.$jsFilename.'.js';
    }

    public static function getCssLinks(array $filesCss): string
    {
        $cssLinks = "";
        foreach ($filesCss as $filename) {
            $cssPath = self::buildPathToCssFilename($filename);
            $cssLinks .= "\n".'<link rel="stylesheet" href="'.$cssPath.'">'."\n";
        }
        return $cssLinks;
    }

    public static function getJsScripts(array $filesJs): string
    {
        $jsScripts = "";
        foreach ($filesJs as $filename) {
            $jsPath = self::buildPathToJsFilename($filename);
            $jsScripts .= "\n" . '<script src="' . $jsPath . '" defer></script>' . "\n";
        }
        return $jsScripts;
    }
}