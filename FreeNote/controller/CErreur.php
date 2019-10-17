<?php
class CErreur{
    private $message;
    private $retourAccueil = '';

    function __construct($arg, $message)
    {
        $this->message = $message;

        foreach ($arg as &$value)
        {
            $this->retourAccueil .= './.';
        }
    }

    function getMessage(){
        return $this->message;
    }

    function setMessage($message)
    {
        $this->message = $message;
    }

    function getRetourAccueil(){
        return $this->retourAccueil;
    }

    function setRetourAccueil($retourAccueil)
    {
        $this->retourAccueil = $retourAccueil;
    }
}
?>
