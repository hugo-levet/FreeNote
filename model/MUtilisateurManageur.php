<?php

require_once ('model/MModel.php');

class MUtilisateurManageur extends MModel {

    function __construct()
    {
        $this->connexionBdd();
    }

    function ajouterUtilisateur($pseudo, $mail, $mdp_crypte)
    {
        $requete = "INSERT INTO utilisateur(pseudo, mail, mdp) VALUES ('$pseudo', '$mail', '$mdp_crypte')';

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
}

?>
