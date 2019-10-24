<?php
require_once ('model/MDiscussionManageur.php');
require_once ('controller/CController.php');
class CAccueil extends CController
{

    private $discussionsManageur;

    private $nbDiscussionParPage = 2;   //nb de discussion par pages
    private $nbDiscussion;              //nb total de discussion
    private $nbPages;                   //nb pages necessaires pour afficher l'ensemble des discussions
    private $pageActuelle;

    //constructeur
    function __construct($arg)
    {
        if(!empty($arg[1]))
        {
            $this->pageActuelle =  $arg[1];
        }
        else
        {
            $this->pageActuelle = 1;
        }

        $this->discussions();
    }

    //getter et setter
    function setNbDiscussionParPage($i)
    {
        $this->nbDiscussionParPage = $i;
    }

    function getNbDiscussionParPage()
    {
        return $this->nbDiscussionParPage;
    }

    function getTableToutesDiscussions()
    {
        return $this->discussionsManageur;
    }

    function getPageActuelle()
    {
        return $this->pageActuelle;
    }

    function getNbPages()
    {
        return $this->nbPages;
    }

    function getNbDiscussion()
    {
        return $this->nbDiscussion;
    }


    //fonction privé appelé par le controller
    private function discussions()
    {
        $this->discussionsManageur = new MDiscussionManageur();

        //      $this->tableToutesDiscussions = $tablediscussion->getDiscussions();

        $this->nbDiscussion = count($this->discussionsManageur->getDiscussions());
        $this->nbPages = ceil($this->nbDiscussion/$this->nbDiscussionParPage); //on compte le nombre de pages

        //si (pageActulelle  > nbPages) pageActuelle = nbPages

        if($this->pageActuelle > $this->nbPages) //si la valeur de $pageActuelle est plus grand que $nbPages
        {
            $this->pageActuelle = $this->nbPages;
        }
    }
}

?>
