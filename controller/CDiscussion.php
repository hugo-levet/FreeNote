<?php
require_once ('model/MDiscussion.php');
class CDiscussion{
    private $discussion;
//    private $messages;

    function __construct($arg) {
        //crée objet discussion a partir de la base de données
        try
        {
            if (isset($arg[1]))
            {
                $this->discussion = new MDiscussion($arg[1]);
            }
            else
            {
                throw new Exception('Aucune discussion selectionnée.');
            }
        }
        catch (Exception $e)
        {
            die('Erreur  : ' . $e->getMessage());
        }

        //instancie le tableau des messages
        $this->messages = $this->discussion->getMessages();
    }

    public function getDiscussion()
    {
        return $this->discussion;
    }

//    public function getMessages()
//    {
//        return $this->messages;
//    }
//
//    public function getMessage($pos)
//    {
//        return $this->messages[$pos];
//    }
//
//    public function getNbMessages()
//    {
//        return count($this->messages);
//    }

    public function setDiscussion($discussion)
    {
        $this->discussion = $discussion;
    }
}
?>
