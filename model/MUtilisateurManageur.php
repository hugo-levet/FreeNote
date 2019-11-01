<?php

require_once ('model/MModel.php');

class MUtilisateurManageur extends MModel {

    function __construct()
    {
        $this->connexionBdd();
    }
}

?>
