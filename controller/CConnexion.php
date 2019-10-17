<?php

use \Vue;

class CConnexion
{
    public function nouvelleAction()
    {
        Vue::generate('Connexion');
    }

    public function creerAction()
    {
        $utilisateur = MUtilisateur::___($_POST['pseudo'], $_POST['mdp']);

        if ($utilisateur) {
            ___::connexion($utilisateur);

        } else {
            Vue::generate('Connexion');
        }
    }

    public function detruireAction()
    {
        ___::deconnexion();
        $this->redirect('/');
    }
}

?>
