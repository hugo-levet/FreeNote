<?php

abstract class Model
{
    private static $_bdd;

    //Instantation de la connexion
    private static function setBdd()
    {
        try
        {
            require_once('model/MVariablesConnexion.php');
            self::$_bdd = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $identifiantBdd, $mdpBdd , array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        }
        catch (Exception $e)
        {
            die('Erreur : ' .$e->getMessage());
        }
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    //Récupération de la connexion
    protected function getBdd()
    {
        if(self::$_bdd ==null)
            self::setBdd();
        return self::$_bdd;
    }

    protected function getAll($table, $obj)
    {
        $var = [];
        $req = $this->getBdd()->prepare('SELECT * FROM'.$table.'ORDER BY id'.$table.' desc');
        $req->execute();
        while ($data = $req ->fetch(PDO::FETCH_ASSOC))
        {
            $var[] = new $obj($data);
        }
        return $var;
        $req->closeCursor();
    }

    protected function getColonne($table, $obj, $attr)
    {
        $var = [];
        $req = $this->getBdd()->prepare('SELECT '.$attr.' FROM '.$table.' ORDER BY id'.$table.' desc');
        $req->execute();
        while ($data = $req ->fetch(PDO::FETCH_ASSOC))
        {
            $var[] = new $obj($data);
        }
        return $var;
        $req->closeCursor();
    }

    protected function getDonnee($table, $obj, $condition)
    {
        $var = [];
        $req = $this->getBdd()->prepare('SELECT * FROM'.$table.' WHERE '.$condition.'ORDER BY id'.$table.' desc');
        $req->execute();
        $obj = $req -> fetch(PDO::FETCH_ASSOC);
        return $obj;
        $req->closeCursor();
    }
}
?>

<!--//Explication: https://www.youtube.com/watch?v=GV-MY1Kg4Hg&t jusqu'à 5:50-->
