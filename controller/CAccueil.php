<?php
class CAccueil
{

    private $tableToutesDiscussions;

    private $nbDiscussionParPage = 2;   //nb de discussion par pages
    private $nbDiscussion;              //nb total de discussion
    private $nbPages;                   //nb pages necessaires pour afficher l'ensemble des discussions
    private $pageActuelle;

    //constructeur
    function __construct()
    {
        if (isset($url) && count($url) > 1)
            throw new Exception('Page introuvable');
        else
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

    function getUneDiscussion($i)
    {
        return $this->tableToutesDiscussions[$i];
    }

    function getPageActuelle()
    {
        return $this->pageActuelle;
    }

    function getNbPages()
    {
        return $this->nbPages;
    }


    //fonction privé appelé par le controller
    private function discussions()
    {
        require_once('model/MBaseDeDonnees.php');

        $this->tableToutesDiscussions = //recupérer toute les discussions selon MBaseDeDonnees;

        $this->nbDiscussion = count($this->tableToutesDiscussions);
        $this->nbPages = ceil($this->nbDiscussion/$this->nbDiscussionParPage); //on compte de nombre de pages

        //si (pageActulelle  > nbPages) pageActuelle = nbPages
        if(isset($_GET['page'])) //si $_GET['page'] existe
        {
            $this->pageActuelle = intval($_GET['page']);

            if($this->pageActuelle > $this->nbPages) //si la valeur de $pageActuelle est plus grand que $nbPages
            {
                $this->pageActuelle = $this->nbPages;
            }
        }
        else
        {
            $this->pageActuelle = 1;
        }
        echo 'accueil';

    }
}

?>