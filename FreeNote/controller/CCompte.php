<?php
class CCompte{
    private $pseudo;
    private $mail;

    function __construct()
    {
        require_once('model/MUtilisateur.php');
        //nouveau utilisateur avec id de session dans un nouvel objet utilisateur
        //this->pseudo = utilisateur.getPseudo();
        $this->pseudo = 'un_pseudo';
        //this->mail = utilisateur.getMail();
        $this->mail = 'un_mail@mail.fr';
    }

    function getPseudo()
    {
        return $this->pseudo;
    }

    function getMail()
    {
        return $this->mail;
    }
}
?>

