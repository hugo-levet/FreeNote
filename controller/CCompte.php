<?php
require_once ('controller/CController.php');
require_once('model/MUtilisateur.php');
class CCompte extends CController
{
    private $utilisateur;

    function __construct($arg)
    {
        //vérifie si l'utilisateur est connecte
        $this->autoConnexion($arg);
        //si pas connecter retourne a l'accueil
        if(!$this->isConnecte())
        {
            header('Location: index.php');
        }

        $this->utilisateur = new MUtilisateur($this->idUtilisateurActuel);

        //gestion modification mdp
        if(!empty($_POST['modificationMdp']))
        {
            if ($this->utilisateur->getMdp() == md5($_POST['ancienMdp']))
            {
                if ($_POST['nouveauMdp'] == $_POST['nouveauMdpBis'])
                {
                    $this->utilisateur->setMdp($_POST['nouveauMdp']);
                    echo 'Mot de passe modifié avec succès.<br>';
                }
                else
                {
                    echo 'Les mots de passe ne correspondent pas.<br>';
                }
            }
            else
            {
                echo 'Le mot de passe actuel est incorrect.<br>';
            }
        }

        //Gestion du pseudo
        if(!empty($_POST['modificationPseudo']))
        {
            if (!is_numeric($_POST['nouveauPseudo']))
            {
                $this->utilisateur->setPseudo($_POST['nouveauPseudo']);
                echo 'Pseudo modifié avec succès.<br>';
            }
            else
            {
                echo 'Le pseudo n\'ai constitué que d\'une suite numérique.<br>';
            }
        }

        //Gestion du mail
        if(!empty($_POST['modificationMail']))
        {
            if (preg_match('/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/', $_POST['nouveauPseudo']))
            {
                $this->utilisateur->setMail($_POST['nouveauMail']);
                echo 'Mail modifié avec succès.<br>';
            }
            else
            {
                echo 'Le mail est invalide.<br>';
            }
        }
    }



    public function getUtilisateur()
    {
        return $this->utilisateur;
    }
}
?>
