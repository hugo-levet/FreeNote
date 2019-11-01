<?php
require_once('model/MUtilisateur.php');
class CController
{
    protected $idUtilisateurActuel;
    protected $utilisateurActuel;
    private $isConnecte = false;
    private $retourRacine;
    private $urlIci;

    protected function autoConnexion($arg = [])
    {
        session_start();
        if (isset($_SESSION['idUtilisateur'], $_SESSION['mdp']))
        {
            // L'authentification est validée.
            $this->isConnecte = true;
            $this->idUtilisateurActuel = $_SESSION['idUtilisateur'];

            $this->utilisateurActuel = new MUtilisateur($_SESSION['idUtilisateur']);
        }

        //retour racine du site
        foreach ($arg as $key)
        {
            if($key != 0)
            {
                $this->retourRacine .= '../';
            }
        }

        //chemin de depuis la racine vers cette page
        foreach ($arg as $key => $p)
        {
            $this->urlIci .= $p;
            if($key < count($arg)-1)
            {
                $this->urlIci .= '/';
            }
        }

        //gestion si deconnexion
        if(!empty($_POST['deconnexion']))
        {
            $this->deconnecter();
        }
    }

    public function getIdUtilisateurActuel()
    {
        return $this->idUtilisateurActuel;
    }

    public function getUtilisateurActuel()
    {
        return $this->utilisateurActuel;
    }

    public function isConnecte()
    {
        return $this->isConnecte;
    }

    public function deconnecter()
    {
        try
        {
            if($this->isConnecte = true)
            {
                $this->isConnecte = false;
                unset($_SESSION['idUtilisateur']);
                unset($_SESSION['mdp']);
            }
            else
            {
                throw new Exception('Utilisateur non connnecté.');
            }
        }
        catch (Exception $e)
        {
            die('Erreur  : ' . $e->getMessage());
        }
    }

    public function connecter()
    {
        try
        {
            if($this->isConnecte = false)
            {
                $this->isConnecte = true;
            }
            else
            {
                throw new Exception('Utilisateur connnecté.');
            }
        }
        catch (Exception $e)
        {
            die('Erreur  : ' . $e->getMessage());
        }
    }

    public function getRetourRacine()
    {
        return $this->retourRacine;
    }

    public function getUrlIci()
    {
        return $this->urlIci;
    }
}
?>
