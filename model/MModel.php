<?php
abstract class MModel{

    private $bdd;
    protected $table;
    protected $composition;

    function connexionBdd()
    {
        //        try
        //        {
        //            require('model/MVariablesConnexion.php');
        //            $this->bdd = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $identifiantBdd, $mdpBdd , array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        //        }
        //        catch (Exception $e)
        //        {
        //            die('Erreur  : ' . $e->getMessage());
        //        }


        require('model/MVariablesConnexion.php');

        $this->bdd = mysqli_connect($host, $identifiantBdd, $mdpBdd, $dbname) or die('Erreur de connexion au serveur : ' . mysqli_connect_error());

        //        mysqli_select_db($dbLink , $dbname) or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));


    }

    function getUnTuple($id)
    {
        //        $requete = $this->bdd->prepare("SELECT * FROM $this->table WHERE id$this->table = $id ORDER BY id$this->table");
        //        $requete->execute();
        //        //exception si la requette est vide
        //        try
        //        {
        //            $reponse = null;
        //            while ($donnees = $requete->fetch())
        //            {
        //                $reponse = $donnees;
        //            }
        //
        //            $requete->closeCursor();
        //
        //            if ($reponse == null)
        //            {
        //                throw new Exception($this->table . ' n\'existe pas.');
        //            }
        //        }
        //        catch (Exception $e)
        //        {
        //            die('Erreur  : ' . $e->getMessage());
        //        }
        //
        //        return $reponse;


        $query = "SELECT * FROM $this->table WHERE id$this->table = $id ORDER BY id$this->table";


        if(!($dbResult = mysqli_query($this->bdd, $query)))
        {
            echo 'Erreur de requête<br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($this->bdd) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }


        while($dbRow = mysqli_fetch_assoc($dbResult))
        {
            $this->hydrate($dbRow);

            //            echo $dbRow['id'.$this->table] . '<br/>';
            //            echo $dbRow['statut'.$this->table] . '<br/>';
            //            echo $dbRow['titre'] ;
            //            echo '<br/><br/>';
        }

        return $dbResult;


    }

    function getUneTable()
    {
        $requete = $this->bdd->query("SELECT * FROM $this->table ORDER BY id$this->table");

        $discussion = $requete->fetchAll();

        return $discussion;
    }

    function getComposition()//ne récupère que l'id de composition
    {
        //        $requete = $this->bdd->prepare("SELECT id$this->composition FROM $this->composition WHERE id$this->table = $this->id");
        //        $requete->execute();
        //
        //        $reponse = [];
        //        while ($donnees = $requete->fetch())
        //        {
        //            array_push($reponse, $donnees);
        //        }
        //
        //        $requete->closeCursor();
        //
        //
        //        return $reponse;



        $query = "SELECT id$this->composition FROM $this->composition WHERE id$this->table = $this->id";


        if(!($dbResult = mysqli_query($this->bdd, $query)))
        {
            echo 'Erreur de requête<br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($this->bdd) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }

        $idComposition = [];
        while($dbRow = mysqli_fetch_assoc($dbResult))
        {
            //            $this->hydrate($dbRow);
            array_push($idComposition, $dbRow['id'.$this->composition]);
            //            echo $dbRow['id'.$this->table] . '<br/>';
            //            echo $dbRow['statut'.$this->table] . '<br/>';
            //            echo $dbRow['titre'] ;
            //            echo '<br/><br/>';
        }
        return $idComposition;


    }
}
