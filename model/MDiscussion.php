<?php
require_once ('model/MModel.php');
class MDiscussion extends MModel {
    protected $id;
    protected $statut;
    protected $titre;
    protected $messages = [];

    function __construct($id)
    {
        $this->id = $id;
        $this->table = 'discussion';
        $this->connexionBdd();
        $tuple = $this->getUnTuple($this->id);
        $this->hydrate($tuple);
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
}
?>
