<?php
abstract class MBaseDeDonnees{

    private $bdd;
    protected $table;

    function connexionBdd()
    {
        try
        {
            require_once('model/MVariablesConnexion.php');
            $this->bdd = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $identifiantBdd, $mdpBdd , array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        }
        catch (Exception $e)
        {
            die('Erreur  : ' . $e->getMessage());
        }
    }

    function getUnTuple($id)
    {
        $requete = $this->bdd->prepare("SELECT * FROM $this->table WHERE id$this->table = $id ORDER BY id$this->table");
        $requete->execute();
        //exception si la requette est vide
        try
        {


            //            foreach($requete as $donnees){
            //contenu
            //            $reponse
            //}
            $reponse = null;
            while ($donnees = $requete->fetch())
            {
                $reponse = $donnees;
            }

            $requete->closeCursor();


            //            $reponse = $requete->execute();
            if ($reponse == null)
            {
                throw new Exception($this->table . ' invalide.');
            }
        }
        catch (Exception $e)
        {
            die('Erreur  : ' . $e->getMessage());
        }

        return $reponse;
    }

    function getUneTable()
    {
        $requete = $this->bdd->query("SELECT * FROM $this->table ORDER BY id$this->table");

        $discussion = $requete->fetchAll();

        return $discussion;
    }
}
