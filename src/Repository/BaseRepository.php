<?php

namespace kenzo\Jeu20\Repository;

use \PDO;

abstract class BaseRepository
{
    private const HOST = 'localhost';
    private const DBNAME = 'jeu_du_20_20';
    private const USERNAME = 'root';
    private const PASSWORD = '';
    private const CHARSET = 'utf8';
    protected \PDO $pdo;
    protected \PDOStatement $pdoStatement;

    public function __construct() {
        try {
            $this->pdo = new \PDO(
                "mysql:host=" . self::HOST . ";dbname=" . self::DBNAME . ";charset=" . self::CHARSET,
                self::USERNAME,
                self::PASSWORD
            );
        } catch (\PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    public static function connect(): static
    {
        return new static();
    }
}