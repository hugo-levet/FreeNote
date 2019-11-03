<?php

require_once ('model/MModel.php');
require_once ('model/MMessage.php');

class MDiscussion extends MModel
{
    protected $id;
    protected $statut;
    protected $titre;
    protected $messages = [];

    function __construct($id)
    {
        $this->id = $id;
        $this->table = 'discussion';
        $this->composition = 'message';
        $this->connexionBdd();
        $tuple = $this->getUnTuple($this->id);

        //crée un tableau des messages de la discussion a partir de la base données
        $idMessages = $this->getComposition();

        foreach ($idMessages as $value)
        {
            array_push($this->messages, new MMessage($value));
        }

    }

    public function hydrate(array $data)
    {
        $this->titre = $data['titre'];
        $this->statut = $data['statutdiscussion'];
    }

    public function getId()
    {
        return $this->id;
    }

    public function getStatut()
    {
        return $this->statut;
    }

    public function setStatut($statut)
    {
        $this->statut = $statut;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    public function getMessages()
    {
        return $this->messages;
    }

    public function getMessage($i)
    {
        return $this->messages[$i];
    }

    public function isOuvert()
    {
        if ($this->statut)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}

?>
