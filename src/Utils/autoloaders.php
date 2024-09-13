<?php

namespace kenzo\Jeu20\utils;

function autoloader(string $className): void{
    $relativePath = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $baseDir = __DIR__ . "/../";
    $fileToInclude = $baseDir . $relativePath . ".php";
    if(file_exists($fileToInclude)) require_once $fileToInclude;
}

function myAutoloadingWithPrefix(string $className): void{
    $prefix = "kenzo\\Jeu20\\";
    $baseDir = __DIR__ . "/../";
    $lengthPrefix = strlen($prefix);
    if (strncmp($prefix, $className, $lengthPrefix) !== 0) return;
    $pathTemp = str_replace($prefix, $baseDir, $className);
    $pathToClassFile = str_replace('\\', '/', $pathTemp).'.php';
    if (file_exists($pathToClassFile)) require_once $pathToClassFile;
}