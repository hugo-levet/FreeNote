<?php
class MBaseDeDonnees{

    private $bdd;

    function __construct()
    {
        //connexion
        try
        {
            $this->bdd = new PDO('mysql:host=mysql-noeguyomarch.alwaysdata.net;dbname=noeguyomarch_freenote ;charset=utf8', '189624_root', 'iutinfoaix');
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        }
        catch (PDOException $exception)
        {
            echo $exception->getMessage();
            echo '<br>Erreur de connexion à la base de données';
        }
    }

    function getDiscussion($id)
    {
        $query = $bdd->query("SELECT * FROM discussion WHERE iddisc == $id");

        $discussion = $query->fetchAll();

        return $discussion;
    }

    function getToutesDiscussions()
    {
        $query = $bdd->query("SELECT * FROM discussion");

        $discussion = $query->fetchAll();

        return $discussion;
    }
}
?>
