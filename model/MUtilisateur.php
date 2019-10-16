<?php
require_once('model/MModel.php');
class MUtilisateur extends MModel
{
    private $id;
    private $pseudo;
    private $mail;
    private $mdp;

    function __construct($mail, $pseudo, $mdp)
    {
        $this->mail = $mail;
        $this->pseudo = $pseudo;
        $this->mdp = $mdp;
        //récupérer id dans base de données
    }
}
?>
