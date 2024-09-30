<?php

/**
 * function that converts a classname to a tableName
 * @param string $className
 * @return string
 */
function classNameToDBTable(string $className): string
{
    $explodedClassName = explode("\\", $className);
    return end($explodedClassName). 's';
}

