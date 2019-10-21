<?php
require_once ('model/MModel.php');
require_once ('model/MMot.php');
class MMessage extends MModel {
    protected $id;
    protected $idDiscussion;
    protected $statut;
    protected $mots = [];

    function __construct($id)
    {
        if (!isset($id))
        {
            echo 'caca';
        }
        $this->id = $id;
        $this->table = 'message';
        $this->composition = 'mot';
        $this->connexionBdd();
        $tuple = $this->getUnTuple($this->id);

        //        $this->idDiscussion = $tuple[1];
        //        $this->statut = $tuple[2];
        //        $this->hydrate($tuple);

        //crée un tableau des mots du message a partir de la base données
        $idMot = $this->getComposition();
        foreach ($idMot as $value)
        {
            array_push($this->mots, new MMot($value));
        }
    }

    public function hydrate(array $data)
    {
        $this->idDiscussion = $data['iddiscussion'];
        $this->statut = $data['statutmessage'];
    }

    public function getId()
    {
        return $this->id;
    }

    public function getIdDiscussion()
    {
        return $this->idDiscussion;
    }

    public function getStatut()
    {
        return $this->statut;
    }

    public function setStatut($statut)
    {
        $this->statut = $statut;
    }

    public function getMots()
    {
        return $this->mots;
    }

    public function getMot($i)
    {
        return $this->mots[$i];
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

    public function verifieNbMot()
    {
        $retour = 0;
        $space = 0;
        for($i =0; $i<strlen($this->composition) or $space >= 2; ++$i)
        {
            if($this->composition[$i] == ' ')
            {
                if($this->composition[$i+1] == ' ' or $i == 0)
                    $this->normalisation($i+1);
                ++$space;
            }
            if($space <= 1)
                $retour = true;
        }
        return $retour;
    }

    public function normalisation($i)//i == i+1
    {
        $j = $i;
        while($this->composition[$i] == ' ')
        {
            for($k = $j; $this->composition[$k] == ' '; ++$k)
            {
                $this->composition[$k] = $this->composition[$k+1];
            }
        }
    }
}
?>
