<?php
require_once ('model/MDiscussion.php');
require_once ('controller/CController.php');
class CDiscussion extends CController
{
    private $discussion;

    function __construct($arg) {
        //vérifie si l'utilisateur est connecte
        $this->autoConnexion();

        //crée objet discussion a partir de la base de données
        try
        {
            if (isset($arg[1]))
            {
                $this->discussion = new MDiscussion($arg[1]);
            }
            else
            {
                throw new Exception('Aucune discussion selectionnée.');
            }
        }
        catch (Exception $e)
        {
            die('Erreur  : ' . $e->getMessage());
        }

        //gestion si cloture d'un message
        if(!empty($_POST['clotureMessage']))
        {
            $this->discussion->clotureMessage($this->discussion->getMessage(count($this->discussion->getMessages())-1)->getId());
            //actualise la discussion pour qu'elle possede le nouveau mot
            $this->discussion = new MDiscussion($arg[1]);
        }

        //gestion si ajout de mot
        if(!empty($_POST['ajoutMot']))
        {
            if(isset($_POST['mot']))
            {
                $motAjout = $_POST['mot'];
//                if (/*le mot est plus petit que 2*/)
//                {

                    $this->discussion->getMessage(count($this->discussion->getMessages())-1)->ajoutMot($motAjout, $this->getIdUtilisateurActuel());
                    //actualise la discussion pour qu'elle possede le nouveau mot
                    $this->discussion = new MDiscussion($arg[1]);
//                }
//                else
//                {
//                    echo 'Vous ne pouvez ajouter que 1 ou 2 mots.<br>'
//                }
            }
        }
    }

    public function getDiscussion()
    {
        return $this->discussion;
    }

    public function setDiscussion($discussion)
    {
        $this->discussion = $discussion;
    }
}
?>
