<?php

require_once ('controller/CController.php');

class CErreur extends CController
{
    private $message;
    private $retourAccueil = '';

    function __construct($arg, $message)
    {
        $this->autoConnexion($arg);
        $this->message = $message;

        foreach ($arg as &$value)
        {
            $this->retourAccueil .= './.';
        }
    }

    function getMessage()
    {
        return $this->message;
    }

    function setMessage($message)
    {
        $this->message = $message;
    }

    function getRetourAccueil()
    {
        return $this->retourAccueil;
    }

    function setRetourAccueil($retourAccueil)
    {
        $this->retourAccueil = $retourAccueil;
    }
}

?>
