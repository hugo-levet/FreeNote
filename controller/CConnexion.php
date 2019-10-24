<?php
require_once('model/MUtilisateur.php');
require_once('controller/CController.php');
class CConnexion extends CController
{
    private $urlRetourDebut = '';
    private $urlRetourFin = '';
    private $urlRetour;
    private $urlIci;

    function __construct($arg)
    {
        //vérifie si l'utilisateur est connecte
        $this->autoConnexion();
        //si connecter retourne a l'accueil
        if($this->isConnecte())
        {
            header('Location: index.php');
        }
        foreach ($arg as $key => $p)
        {
            if ($key >= 1)
            {
                $this->urlRetourDebut .= '../';
            }

            if($key != 0)
            {
                if ($key <= 1)
                {
                    $this->urlRetourFin .= strval($p);
                }
                else
                {
                    $this->urlRetourFin .= '/' . strval($p);
                }
            }
        }
        $this->urlIci = $this->urlRetourDebut . 'connexion/' . $this->urlRetourFin;
        $this->urlRetour = $this->urlRetourDebut . $this->urlRetourFin;
        echo $this->urlRetour;
        //vérifie si on viens de se connecter
        if(!empty($_POST['connexion']))
        {
            $this->verificationConnexion();
        }
    }

    function verificationConnexion()
    {
        if (isset($_POST['pseudo'], $_POST['mdp']))
        {
            //récupération de l'utilisateur qui veut se connecter
            $utilisateurTemp = new MUtilisateur($_POST['pseudo']);
            $mdp = $utilisateurTemp->getMdp();

            if ($mdp == md5($_POST['mdp']))
            {
                session_start();
                $_SESSION['idUtilisateur'] = $utilisateurTemp->getId();
                $_SESSION['mdp'] = md5($_POST['mdp']);
                header("location: ./$this->urlRetour");
            }
            else
            {
                echo 'Oh oh, problème d\'authentification.';
            }
        }
    }

    public function getUrlIci()
    {
        return $this->urlIci;
    }
}

?>
