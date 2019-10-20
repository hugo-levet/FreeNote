<?php
require_once('model/MUtilisateur.php');
class CConnexion
{
    public $urlRetourdeb = '';
    public $urlRetourfin = '';
    private $urlRetour;
    private $urlIci;

    function __construct($arg)
    {
        foreach ($arg as $key => $p)
        {
            if ($key < 1)
            {
//                $this->urlRetourdeb .= '../';
            }
            else
            {
                $this->urlRetourdeb .= '../';
            }

            if($key != 0)
            {
            if ($key <= 1)
            {
                $this->urlRetourfin .= strval($p);
            }
            else
            {
                $this->urlRetourfin .= '/' . strval($p);
            }
            }
        }
        $this->urlIci = $this->urlRetourdeb . 'connexion/' . $this->urlRetourfin;
        $this->urlRetour = $this->urlRetourdeb . $this->urlRetourfin;

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
            // Connexion au serveur de la base de données, à la base de données et
            // récupération dans la table utilisateur du login dans la variable $login
            // et du mot de passe dans la variable $pwd.
            $utilisateurTemp = new MUtilisateur($_POST['pseudo']);
            $mdp = $utilisateurTemp->getMdp();

            if (/*login == $_POST['login'] && */$mdp == md5($_POST['mdp']))
            {
                session_start();
                $_SESSION['idUtilisateur'] = $utilisateurTemp->getId();
                $_SESSION['mdp'] = md5($_POST['mdp']);
                header("location: $this->urlRetour");
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
