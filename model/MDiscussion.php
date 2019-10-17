<?php
class MDiscussion {
    private $id;
    private $statut;
    private $titre;

    function __construct($id)
    {
        $this->id = $id;
        require_once ('model/MBaseDeDonnees.php');
        $bdd = new MBaseDeDonnees();
        $discussion = $bdd->getDiscussion($this->id);
        //si une discussion qui n'existe pas
        if ($discussion == null)
        {
            $this->statut = 'non_existant';
            $this->titre = 'donc pas de titre';
        }
        else
        {
            $this->statut = $discussion[0]['statutdisc'];
            $this->titre = $discussion[0]['titre'];
        }
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
