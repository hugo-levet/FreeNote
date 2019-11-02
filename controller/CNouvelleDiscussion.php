<?php
require_once('controller/CController.php');
require_once('model/MDiscussionManageur.php');
class CNouvelleDiscussion extends CController
{
    function __construct($arg)
    {
        //vérifie si l'utilisateur est connecte
        $this->autoConnexion($arg);
        //si pas connecter retourne a l'accueil
        if(!$this->isConnecte())
        {
            header('Location: index.php');
        }

        //vérifie si on viens de créer une discussion
        if(!empty($_POST['nouvelleDiscussion']))
        {
            if($this->utilisateurActuel->getNombreDiscussion() < 3 || $this->utilisateurActuel->getRole() == 'admin')
            {
                //crée une discussion avec le titre du formulaire
                $discussionManageur = new MDiscussionManageur($this->idUtilisateurActuel);
                $idDiscussion = $discussionManageur->ajouterDiscussion($_POST['titre']);

                //renvoi vers la discussion créé
                header('Location: discussion/'.$idDiscussion);
            }
            else
            {
                echo 'Vous avez créé trop de discussion.<br>';
            }
        }
    }
}
?>
