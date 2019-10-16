<?php
abstract class MModel
{
    private static $_bdd;

    //Instantiation de la connexion
    private static function setBdd()
    {
        self::$_bdd = new PDO('mysql:host=mysql-noeguyomarch.alwaysdata.net ; dbname=noeguyomarch_freenote ;charset=utf8', '189624_root', 'iutinfoaix');
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

<!-- Explication:   jusqu'à 5:50 -->
