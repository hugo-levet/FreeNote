<?php
require_once ('model/MModel.php');
class MDiscussionManageur extends MModel {
    //    protected $id;
    //    protected $statut;
    //    protected $titre;
    protected $discussions = [];

    function __construct()
    {
        $this->table = 'discussion';
        $this->connexionBdd();
        $tuple = $this->getUneTable();

    }

    public function hydrate(array $data)
    {
        $ligneDiscussion = [$data['iddiscussion'], $data['statutdiscussion'], $data['titre']];
        array_push($this->discussions, $ligneDiscussion);
    }

    public function getDiscussions()
    {
        return $this->discussions;
    }

    public function getDiscussion($ligne)
    {
        return $this->discussions[$ligne];
    }

    public function getId($ligne)
    {
        return $this->discussions[$ligne][0];
    }

    public function getTitre($ligne)
    {
        return $this->discussions[$ligne][2];
    }

    public function getStatut($ligne)
    {
        return $this->discussions[$ligne][1];
    }
}
?>
