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
<<<<<<< HEAD
        $this->titre = $tuple[2];
        $this->statut = $tuple[1];
=======
        $this->hydrate($tuple);
>>>>>>> 9210c95ff8e4f58948353dd62ebdc1c597e2af53
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
