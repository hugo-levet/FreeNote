<?php
require_once ('model/MDiscussion.php');
require_once ('controller/CController.php');
class CDiscussion extends CController
{
    private $discussion;

    function __construct($arg) {
        //vérifie si l'utilisateur est connecté
        $this->autoConnexion($arg);

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

        //gestion si suppression de discussion
        if(!empty($_POST['suppressionDiscussion']))
        {
                $this->discussion->suppressionDiscussion();
            header('Location: '.$this->retourRacine);
        }

        //gestion si ajout de mot
        if(!empty($_POST['ajoutMot']))
        {
            if(isset($_POST['mot']))
            {
                $motAjout = $_POST['mot'];

                //normalisation de la phrase
                $mots = [];
                for($i = 0; $i<strlen($motAjout); ++$i)
                {
                    if(ctype_alpha($motAjout[$i]))
                    {
                        array_push($mots, $motAjout[$i]);
                    }
                    else
                    {
                        if(count($mots) == 0)
                        {

                        }
                        elseif(count($mots) == 1)
                        {
                            array_push($mots, ' ');
                        }
                        elseif($mots[count($mots)-1] != ' ')
                        {
                            array_push($mots, ' ');
                        }
                    }
                }
                if($mots[count($mots)-1] == ' ')
                {
                    array_splice($mots, count($mots)-1);
                }
                $motAjout = implode($mots);

                function verifieNbMot($phrase)
                {
                    $espaces = 0;
                    for($i = 0; $i<strlen($phrase); ++$i)
                    {
                        if($phrase[$i] == ' ')
                        {
                            ++$espaces;
                        }
                    }

                    if($espaces > 1)
                    {
                        return false;
                    }
                    else
                    {
                        return true;
                    }
                }
                echo $motAjout . '.';

                if(verifieNbMot($motAjout))
                {
                    $this->discussion->getMessage(count($this->discussion->getMessages())-1)->ajoutMot($motAjout, $this->getIdUtilisateurActuel());
                    //actualise la discussion pour qu'elle possede le nouveau mot
                    $this->discussion = new MDiscussion($arg[1]);
                }
                else
                {
                    echo '<p class="erreur">Vous ne pouvez ajouter que 1 ou 2 mots.</p>';
                }
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
