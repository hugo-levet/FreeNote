<?php
require_once ('model/MBaseDeDonnees.php');
class MDiscussion extends MBaseDeDonnees {
    private $id;
    private $statut;
    private $titre;

    function __construct($id)
    {
        $this->id = $id;
        $this->table = 'discussion';
        $this->connexionBdd();
        $tuple = $this->getUnTuple($this->id);
        $this->titre = $tuple[1];
        $this->statut = $tuple[2];
    }

    public function getId()
    {
        return $this->id;
    }

    public function getStatut()
    {
        return $this->statut;
    }

    public function getTitre()
    {
        return $this->titre;
    }
}
?>
