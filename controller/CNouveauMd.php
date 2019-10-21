<?php
require_once ('controller/CController.php');

class CNouveauMdp extends CController{
    private $nouveauMdp;
    private $mail;

    function __construct(){
    }

    public function getMail(){
        return $this->mail;
    }

    public function setMail($mail){
        $this->mail = $mail;
    }

    //ini_set('display_errors', 1);
    //error_reporting(E_ALL);
    $from = "freenote@help.com";
    $to = "$mail";
    $subject = "Freenote : votre nouveau mot de passe !";
    $message = "Votre nouveau mot de passe est : ". $nouveauMdp . "!";
    //mail($to, $subject, $message, $headers);
    echo "Un email contenant votre nouveau mot de passe a été envoyé à cette adresse.";

}
?>