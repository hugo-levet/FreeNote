<?php
require_once ('controller/CController.php');
require_once('model/MUtilisateur.php');
class CCompte extends CController
{
    private $utilisateur;

    function __construct($arg)
    {
        //vérifie si l'utilisateur est connecte
        $this->autoConnexion();
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
    }

    public function getUtilisateur()
    {
        return $this->utilisateur;
    }
}
?>
