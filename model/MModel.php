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
        $requete = "SELECT * FROM $this->table WHERE id$this->table = $id ORDER BY id$this->table";

        if(!($resultat = mysqli_query($this->bdd, $requete)))
        {
            echo 'Erreur de requête<br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($this->bdd) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $requete . '<br/>';
            exit();
        }


        while($ligneTable = mysqli_fetch_assoc($resultat))
        {
            $this->hydrate($ligneTable);
        }

        return $resultat;
    }

    function getUneTable()
    {
        $requete = "SELECT * FROM $this->table ORDER BY id$this->table";

        if(!($resultat = mysqli_query($this->bdd, $requete)))
        {
            echo 'Erreur de requête<br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($this->bdd) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $requete . '<br/>';
            exit();
        }


        while($ligneTable = mysqli_fetch_assoc($resultat))
        {
            $this->hydrate($ligneTable);
        }

        return $resultat;

    }

    function getComposition()//ne récupère que l'id de composition
    {
        $requete = "SELECT id$this->composition FROM $this->composition WHERE id$this->table = $this->id";

        if(!($resultat = mysqli_query($this->bdd, $requete)))
        {
            echo 'Erreur de requête<br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($this->bdd) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $requete . '<br/>';
            exit();
        }

        $idComposition = [];
        while($ligneTable = mysqli_fetch_assoc($resultat))
        {
            array_push($idComposition, $ligneTable['id'.$this->composition]);
        }

        return $idComposition;
    }

    function ajoutMot($valeur, $idUtilisateur)
    {
        $requete = "INSERT INTO mot (idmessage, idutilisateur, valeur) VALUES ($this->id, $idUtilisateur, '$valeur')";


        if(!($resultat = mysqli_query($this->bdd, $requete)))
        {
            echo 'Erreur de requête<br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($this->bdd) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $requete . '<br/>';
            exit();
        }
    }

    function clotureMessage($id)
    {
        //ferme le dernier message
        $requete = "UPDATE message SET statutmessage = 1 WHERE idmessage = $id";

        if(!(mysqli_query($this->bdd, $requete)))
        {
            echo 'Erreur de requête<br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($this->bdd) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $requete . '<br/>';
            exit();
        }

        //crée un nouveau message ouvert
        $requete = "INSERT INTO message (iddiscussion, statutmessage) VALUES ($this->id, 0)";

        if(!(mysqli_query($this->bdd, $requete)))
        {
            echo 'Erreur de requête<br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($this->bdd) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $requete . '<br/>';
            exit();
        }
    }

    function getUnTupleParPseudo($pseudo)
    {
        $requete = "SELECT * FROM utilisateur WHERE pseudo = '$pseudo'";

        if(!($resultat = mysqli_query($this->bdd, $requete)))
        {
            echo 'Erreur de requête<br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($this->bdd) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $requete . '<br/>';
            exit();
        }


        while($ligneTable = mysqli_fetch_assoc($resultat))
        {
            $this->hydrate($ligneTable);
        }

        return $resultat;
    }

    function aParticipe($idUtilisateur)
    {
        echo $idUtilisateur;
        $requete = "SELECT * FROM mot WHERE idutilisateur = $idUtilisateur AND idmessage = $this->id";

        if(!($resultat = mysqli_query($this->bdd, $requete)))
        {
            echo 'Erreur de requête<br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($this->bdd) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $requete . '<br/>';
            exit();
        }

        $nbmsg = 0;

        while($ligneTable = mysqli_fetch_assoc($resultat))
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
        $requete = "UPDATE utilisateur SET mdp = '$mdp' WHERE idutilisateur = $this->id";

        if(!(mysqli_query($this->bdd, $requete)))
        {
            echo 'Erreur de requête<br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($this->bdd) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $requete . '<br/>';
            exit();
        }
    }
}
