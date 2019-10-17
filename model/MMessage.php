<?php
require_once ('model/MModel.php');
class MMessage extends MModel {
    protected $id;
    protected $idDiscussion;
    protected $statut;
    protected $mots = [];

    function __construct($id)
    {
        $this->id = $id;
        $this->table = 'message';
        $this->connexionBdd();
        $tuple = $this->getUnTuple($this->id);
        $this->hydrate($tuple);
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
}
?>
