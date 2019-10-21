<?php
class CController
{
    protected $idUtilisateurActuel;
    private $isConnecte = false;


    public function autoConnexion()
    {
        session_start();
        if (isset($_SESSION['idUtilisateur'], $_SESSION['mdp']))
        {
            // L'authentification est validée.
            $this->isConnecte = true;
            $this->idUtilisateurActuel = $_SESSION['idUtilisateur'];
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

    public function setIdUtilisateurActuel($id)
    {
        $this->idUtilisateurActuel = $id;
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
}
?>
