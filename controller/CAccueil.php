<?php
class CAccueil
{

    private $tableToutesDiscussions;

    private $nbDiscussionParPage = 2;//nb de messages par pages
    private $nbDiscussion;
    private $nbPages;
    private $pageActuelle;


    function __construct()
    {
        if (isset($url) && count($url) > 1)
            throw new \mysql_xdevapi\Exception('Page introuvable');
        else
            $this->discussions();
    }

    function setNbDiscussionParPage($i)
    {
        $this->nbDiscussionParPage = $i;
    }


    private function discussions()
    {
        require_once('model/MBaseDeDonnees.php');

        $this->tableToutesDiscussions = //recupéerer toute les discussions selon MBaseDeDonnees;

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

$premiereEntree = ($this->pageActuelle - 1) * $this->nbDiscussionParPage; //on calcul la premiere entree a lire dans la table ex: (2 - 1) * 2 = premiere entrée 0,1,[2],3,4, ...

?>