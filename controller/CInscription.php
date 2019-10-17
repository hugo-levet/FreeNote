<?php

use \Vue;

class CInscription
{
    public function nouvelleAction()
    {
        Vue::generate('Inscription');
    }

    public function creerAction()
    {
        $utilisateur = new MUtilisateur();
    }


}

?>
