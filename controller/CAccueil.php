<?php

require_once ('model/MDiscussionManageur.php');
require_once ('controller/CController.php');

class CAccueil extends CController
{

    private $discussionsManageur;

    private $nbDiscussionParPage = 2;   //nb de discussion par pages
    private $nbDiscussion;              //nb total de discussion
    private $nbPages;                   //nb pages necessaires pour afficher l'ensemble des discussions
    private $pageActuelle = 1;

    //constructeur
    function __construct($arg)
    {
        $this->autoConnexion($arg);

        if(count($arg) > 2)
        {
            $this->nbDiscussionParPage = $arg[2];

            if ($this->nbDiscussionParPage > 25)
            {
                $this->nbDiscussionParPage = 25;
            }
        }

        if(count($arg) > 1)
        {
            if($arg[1] == "")
            {
                $this->pageActuelle = 1;
            }
            else
            {
                $this->pageActuelle = $arg[1];
            }
        }
        else
        {
            header("Location: ./");
        }

        $this->discussions();

        //vérifie si on viens de changer la pagination
        if(!empty($_POST['pagination']))
        {
            header('Location: '.$this->retourRacine.'accueil/'.$this->pageActuelle.'/'.$this->nbDiscussionParPage = intval($_POST['nbDiscParPage']));
        }
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
        $this->discussionsManageur = new MDiscussionManageur($this->idUtilisateurActuel);

        //$this->tableToutesDiscussions = $tablediscussion->getDiscussions();

        $this->nbDiscussion = count($this->discussionsManageur->getDiscussions());
        $this->nbPages = ceil($this->nbDiscussion/$this->nbDiscussionParPage); //on compte le nombre de pages

        if($this->pageActuelle > $this->nbPages) //si la valeur de $pageActuelle est plus grand que $nbPages
        {
            //$this->pageActuelle = $this->nbPages;
            header('Location: '.$this->retourRacine.'accueil/'.$this->nbPages.'/'.$this->nbDiscussionParPage);
        }

        //si (pageActulelle  > nbPages) pageActuelle = nbPages
    }
}

?>
