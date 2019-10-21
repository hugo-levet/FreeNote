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

    public function verifieNbMot($str)
    {

        function normalisation($i, $str)//i == i+1
        {
            $j = $i;
            while($str[$i] == ' ')
            {
                for($k = $j; $str[$k] == ' '; ++$k)
                {
                    $str[$k] = $str[$k+1];
                }
            }
        }

        $retour = 0;
        $space = 0;
        for($i =0; $i<strlen($str) or $space >= 2; ++$i)
        {
            if($str[$i] == ' ')
            {
                if($str[$i+1] == ' ' or $i == 0)
                    normalisation($i+1, $str);
                ++$space;
            }
            if($space <= 1)
                $retour = true;
        }
        return $retour;
    }
}
?>
