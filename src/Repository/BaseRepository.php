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

    /**
     * Méthode générique findAll qui renvoie tous les enregistrements sous forme d'objets
     * @param string $className Le nom de la classe qui représente la table (Question::class par exemple)
     * @return array Tableau d'objets de la classe donnée
     */
    public function findAll(string $className): array {
        $objectArray = [];
        $table = classNameToDBTable($className);
        $this->pdoStatement = $this->pdo->prepare("SELECT * FROM :table");
        $this->pdoStatement->bindValue('table', $table);
        $this->pdoStatement->execute();
        $stmtArray = $this->pdoStatement->fetchAll(\PDO::FETCH_OBJ);
        $this->hydrateAll($stmtArray, $className);
        return $objectArray;
    }
}