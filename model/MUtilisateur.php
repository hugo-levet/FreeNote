<?php

include 'Mots.php';
include 'Message.php';

class Utilisateur
{
    private $i_UserID;
    private $s_Pseudo;
    private $s_Email;
    private $s_MDP;

    public function EcrireUnMot()
    {

    }

    public function setPseudo($new_pseudo)
    {
        $s_Pseudo = $new_pseudo;
    }
}

?>