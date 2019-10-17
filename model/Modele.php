<?php

use PDO;
use Config;

abstract class Modele
{
    private static $bdd;

    // Instanciation de la connexion
    private static function setBdd()
    {
        $dsn = 'mysql:host=' . BDD_HOTE . '; dbname=' . BDD_NOM . '; charset=utf8';
        self::$bdd = new PDO($dsn, BDD_UTILISATEUR, BDD_MDP);
        // Jette une exception si une erreur se produit
        self::$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    // Récupération de la connexion
    protected static function getBdd()
    {
        if (self::$bdd ==null)
            self::setBdd();
        return self::$bdd;
    }

    protected function getAll($table, $obj)
    {
        $var = [];
        $req = $this->getBdd()->prepare('SELECT * FROM'.$table.'ORDER BY id desc');
        $req->execute();
        while ($data = $req ->fetch(PDO::FETCH_ASSOC))
        {
            $var[] = new $obj($data);
        }
        return $var;
        $req->closeCursor();
    }
}

?>
