<?php
abstract class MModel{

    private $bdd;
    protected $table;
    protected $composition;

    function connexionBdd()
    {
        require('model/MVariablesConnexion.php');

        $this->bdd = mysqli_connect($host, $identifiantBdd, $mdpBdd, $dbname) or die('Erreur de connexion au serveur : ' . mysqli_connect_error());
    }

    function getUnTuple($id)
    {
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
            array_push($idComposition, $dbRow['id'.$this->composition]);
        }

        return $idComposition;
    }

    function ajoutMot($valeur, $idUtilisateur)
    {
        $query = "INSERT INTO mot (idmessage, idutilisateur, valeur) VALUES ($this->id, $idUtilisateur, '$valeur')";


        if(!($dbResult = mysqli_query($this->bdd, $query)))
        {
            echo 'Erreur de requête<br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($this->bdd) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }
    }

    function clotureMessage($id)
    {
        //ferme le dernier message
        $query = "UPDATE message SET statutmessage = 1 WHERE idmessage = $id";

        if(!(mysqli_query($this->bdd, $query)))
        {
            echo 'Erreur de requête<br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($this->bdd) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }

        //crée un nouveau message ouvert
        $query = "INSERT INTO message (iddiscussion, statutmessage) VALUES ($this->id, 0)";

        if(!(mysqli_query($this->bdd, $query)))
        {
            echo 'Erreur de requête<br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($this->bdd) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }
    }

    function getUnTupleParPseudo($pseudo)
    {
        $query = "SELECT * FROM utilisateur WHERE pseudo = '$pseudo'";

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
        }

        return $dbResult;
    }

    function aParticipe($idUtilisateur)
    {
        echo $idUtilisateur;
        $query = "SELECT * FROM mot WHERE idutilisateur = $idUtilisateur AND idmessage = $this->id";

        if(!($dbResult = mysqli_query($this->bdd, $query)))
        {
            echo 'Erreur de requête<br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($this->bdd) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }

        $nbmsg = 0;

        while($dbRow = mysqli_fetch_assoc($dbResult))
        {
            $nbmsg += 1;
        }

        if ($nbmsg > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function changementMdp($mdp)
    {
        //ferme le dernier message
        $query = "UPDATE utilisateur SET mdp = '$mdp' WHERE idutilisateur = $this->id";

        if(!(mysqli_query($this->bdd, $query)))
        {
            echo 'Erreur de requête<br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($this->bdd) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }
    }
}
