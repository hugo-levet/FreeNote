<?php
abstract class MModel{

    protected static $bdd;
    public static $isConnecte;
    protected $table;
    protected $composition;

    function connexionBdd()
    {
        require('model/MVariablesConnexion.php');
        if(!self::$isConnecte)
        {
            self::$bdd = mysqli_connect($host, $identifiantBdd, $mdpBdd, $dbname) or die('Erreur de connexion au serveur : ' . mysqli_connect_error());
            self::$isConnecte = true;
        }
    }

    function getUnTuple($id)
    {
        $requete = "SELECT * FROM $this->table WHERE id$this->table = $id ORDER BY id$this->table";

        if(!($resultat = mysqli_query(self::$bdd, $requete)))
        {
            echo 'Erreur de requête<br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error(self::$bdd) . '<br/>';
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

        if(!($resultat = mysqli_query(self::$bdd, $requete)))
        {
            echo 'Erreur de requête<br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error(self::$bdd) . '<br/>';
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

        if(!($resultat = mysqli_query(self::$bdd, $requete)))
        {
            echo 'Erreur de requête<br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error(self::$bdd) . '<br/>';
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


        if(!($resultat = mysqli_query(self::$bdd, $requete)))
        {
            echo 'Erreur de requête<br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error(self::$bdd) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $requete . '<br/>';
            exit();
        }
    }

    function clotureMessage($id)
    {
        //ferme le dernier message
        $requete = "UPDATE message SET statutmessage = 1 WHERE idmessage = $id";

        if(!(mysqli_query(self::$bdd, $requete)))
        {
            echo 'Erreur de requête<br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error(self::$bdd) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $requete . '<br/>';
            exit();
        }

        //crée un nouveau message ouvert
        $requete = "INSERT INTO message (iddiscussion, statutmessage) VALUES ($this->id, 0)";

        if(!(mysqli_query(self::$bdd, $requete)))
        {
            echo 'Erreur de requête<br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error(self::$bdd) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $requete . '<br/>';
            exit();
        }
    }

    function getUnTupleParPseudo($pseudo)
    {
        $requete = "SELECT * FROM utilisateur WHERE pseudo = '$pseudo'";

        if(!($resultat = mysqli_query(self::$bdd, $requete)))
        {
            echo 'Erreur de requête<br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error(self::$bdd) . '<br/>';
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
        $requete = "SELECT * FROM mot WHERE idutilisateur = $idUtilisateur AND idmessage = $this->id";

        if(!($resultat = mysqli_query(self::$bdd, $requete)))
        {
            echo 'Erreur de requête<br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error(self::$bdd) . '<br/>';
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
    /*
    function changementMdp($mdp)
    {
        //ferme le dernier message
        $requete = "UPDATE utilisateur SET mdp = '$mdp' WHERE idutilisateur = $this->id";

        if(!(mysqli_query(self::$bdd, $requete)))
        {
            echo 'Erreur de requête<br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error(self::$bdd) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $requete . '<br/>';
            exit();
        }

    }
    function changementPseudo($pseudo)
    {
        //ferme le dernier message
        $requete = "UPDATE utilisateur SET pseudo = '$pseudo' WHERE idutilisateur = $this->id";

        if (!(mysqli_query(self::$bdd, $requete))) {
            echo 'Erreur de requête<br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error(self::$bdd) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $requete . '<br/>';
            exit();
        }
    }

        function changementMail($mail)
        {
            //ferme le dernier message
            $requete = "UPDATE utilisateur SET mail = '$mail' WHERE idutilisateur = $this->id";

            if (!(mysqli_query(self::$bdd, $requete))) {
                echo 'Erreur de requête<br/>';
                // Affiche le type d'erreur.
                echo 'Erreur : ' . mysqli_error(self::$bdd) . '<br/>';
                // Affiche la requête envoyée.
                echo 'Requête : ' . $requete . '<br/>';
                exit();
            }
        }
*/
    function changementBDD($nouvval, $type)
    {
        //ferme le dernier message
        $requete = "UPDATE utilisateur SET $type = '$nouvval' WHERE idutilisateur = $this->id";

        if (!(mysqli_query(self::$bdd, $requete))) {
            echo 'Erreur de requête<br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error(self::$bdd) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $requete . '<br/>';
            exit();
        }
    }

    function ajouterUtilisateur($pseudo, $mail, $mdp_crypte)
    {
        $requete = "INSERT INTO utilisateur(pseudo, mail, mdp, role) VALUES ('$pseudo', '$mail', '$mdp_crypte', 'membre')";

        if(!($resultat = mysqli_query(self::$bdd, $requete)))
        {
            echo 'Erreur de requête<br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error(self::$bdd) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $requete . '<br/>';
            exit();
        }
    }

    function ajouterDiscussion($titre) //la valeur de retour est l'id de la discussion créé
    {
        $requete = "INSERT INTO discussion(titre) VALUES ('$titre')";

        if(!($resultat = mysqli_query(self::$bdd, $requete)))
        {
            echo 'Erreur de requête<br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error(self::$bdd) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $requete . '<br/>';
            exit();
        }

        //enregistre l'id de la discussin créé
        $requete = "SELECT MAX(iddiscussion) AS max_id, iddiscussion FROM discussion";

        if(!($resultat = mysqli_query(self::$bdd, $requete)))
        {
            echo 'Erreur de requête<br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error(self::$bdd) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $requete . '<br/>';
            exit();
        }

        $idDiscussion;
        while($ligneTable = mysqli_fetch_assoc($resultat))
        {
            $idDiscussion = $ligneTable['max_id'];
        }

        //crée un nouveau message vide
        $requete = "INSERT INTO message (iddiscussion, statutmessage) VALUES ($idDiscussion, 0)";

        if(!(mysqli_query(self::$bdd, $requete)))
        {
            echo 'Erreur de requête<br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error(self::$bdd) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $requete . '<br/>';
            exit();
        }

        //incremente le nombre de discussion créé
        $requete = "UPDATE utilisateur SET nombrediscussion = nombrediscussion + 1 WHERE idutilisateur = $this->idUtilisateurActuel";

        if (!(mysqli_query(self::$bdd, $requete))) {
            echo 'Erreur de requête<br/>';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error(self::$bdd) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $requete . '<br/>';
            exit();
        }

        return $idDiscussion;
    }

    function suppressionDiscussion($id = 0)
    {
        if($id == 0) //supprime la discussion actuelle
        {
            //récupérer les id des messages a supprimer
            $requete = "SELECT idmessage FROM message WHERE iddiscussion = ".$this->id;

            if(!($resultat = mysqli_query(self::$bdd, $requete)))
            {
                echo 'Erreur de requête<br/>';
                // Affiche le type d'erreur.
                echo 'Erreur : ' . mysqli_error(self::$bdd) . '<br/>';
                // Affiche la requête envoyée.
                echo 'Requête : ' . $requete . '<br/>';
                exit();
            }

            $idMessages = [];
            while($ligneTable = mysqli_fetch_assoc($resultat))
            {
                array_push($idMessages, $ligneTable['idmessage']);
            }

            //supprime tous les mots
            foreach($idMessages as &$unIdMessage)
            {
                $requete = "DELETE FROM mot WHERE idmessage = ".$unIdMessage;

                if (!(mysqli_query(self::$bdd, $requete))) {
                    echo 'Erreur de requête<br/>';
                    // Affiche le type d'erreur.
                    echo 'Erreur : ' . mysqli_error(self::$bdd) . '<br/>';
                    // Affiche la requête envoyée.
                    echo 'Requête : ' . $requete . '<br/>';
                    exit();
                }
            }

            //supprime tous les messages
            $requete = "DELETE FROM message WHERE iddiscussion = ".$this->id;

            if (!(mysqli_query(self::$bdd, $requete))) {
                echo 'Erreur de requête<br/>';
                // Affiche le type d'erreur.
                echo 'Erreur : ' . mysqli_error(self::$bdd) . '<br/>';
                // Affiche la requête envoyée.
                echo 'Requête : ' . $requete . '<br/>';
                exit();
            }

            //supprime la discussion
            $requete = "DELETE FROM discussion WHERE iddiscussion = ".$this->id;

            if (!(mysqli_query(self::$bdd, $requete))) {
                echo 'Erreur de requête<br/>';
                // Affiche le type d'erreur.
                echo 'Erreur : ' . mysqli_error(self::$bdd) . '<br/>';
                // Affiche la requête envoyée.
                echo 'Requête : ' . $requete . '<br/>';
                exit();
            }
        }
        else //supprime la discussion avec l'id renseigné
        {

        }
    }
}
?>
