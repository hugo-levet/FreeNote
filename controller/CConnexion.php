<?php

class CConnexion
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        require_once('view/connexion.php');
        $this->pdo = $pdo;
    }

    public function connexion($utilisateur, $mdp)
    {
        // Trouve l'utilisateur correspondant au paramètre utilisateur
        $req = $this->pdo->prepare('SELECT * FROM utilisateur WHERE username = :utilisateur');
        $req->execute(['username' => $utilisateur]);
        $req->setFetchMode(PDO::FETCH_OBJ, Utilisateur::class);
        $utilisateur = $req->fetch();
        if ($utilisateur === false)
            return null;

        // Vérifie que le mot de passe entré corresponde bien au compte
        if (password_verify($mdp, $utilisateur->$mdp)) {
            session_start();
            $_SESSION['connexion'] = $utilisateur->id;
            return $utilisateur;
        }
        return null;
    }
}

?>
