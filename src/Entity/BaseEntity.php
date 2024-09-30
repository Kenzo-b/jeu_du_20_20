<?php

namespace kenzo\Jeu20\Entity;

abstract class baseEntity
{
    public function __construct(){}

    /**
     * @param \stdClass $stmtRow Object stdClass récupérer à partir d'une requête
     * @return void
     */
    public static function hydrate(\stdClass $stmtRow): static
    {
        $object = new static();
        foreach ($stmtRow as $attribute => $value)
        {
            if($value === null) continue;
            $explodedClassName = explode("\\", $object::class);
            $className = strtolower(end($explodedClassName));
            $prefix = explode('_', $attribute)[0];
            if ($prefix === $className) {
                $attribute = substr_replace($attribute, '', 0, strlen($prefix));
            }
            $method = 'set'.str_replace(' ', '', ucwords(str_replace('_', ' ', $attribute)));
            if (!is_callable([$object, $method])) continue;
            $reflectionMethod = new \ReflectionMethod($object, $method);
            $parameterType = $reflectionMethod->getParameters()[0]->getType();
            if($parameterType->getName() === \DateTimeImmutable::class) {
                $value = new \DateTimeImmutable($value);
            }
            if($parameterType->getName() === \DateTime::class) {
                $value = new \DateTime($value);
            }
            $object->$method($value);
        }
        return $object;
    }

    /**
     * @param array $stmtArray
     * @return array
     */
    public static function hydrateAll(array $stmtArray): array
    {
        $objectArray = [];
        foreach ($stmtArray as $stmtRow) {
            $objectArray[] = static::hydrate($stmtRow);;
        }
        return $objectArray;
    }


}