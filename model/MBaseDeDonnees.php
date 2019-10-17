<?php
class MBaseDeDonnees{

    private $bdd;

    function __construct()
    {
        //connexion
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

    function getDiscussion($id)
    {
        $requete = $this->bdd->query("SELECT * FROM discussion WHERE iddisc = $id");
//        $requete->execute([$id]);

        $discussion = $requete->fetchAll();

        return $discussion;
    }

    function getToutesDiscussions()
    {
        $requete = $this->bdd->query("SELECT * FROM discussion Order By iddesc");

        $discussion = $requete->fetchAll();

        return $discussion;
    }
}
