<?php

class CConnexion
{
    private $pdo;
    private $pseudo;
    private $mdp;

    public function __construct(PDO $pdo)
    {
        require_once('view/connexion.php');
        $this->pdo = $pdo;
    }

    public function connexion()
    {
        if (!isset($_POST['action']))
            header('Location: ../view/VConnexion.php');

        if ($_POST['action'] != 'connexion')
            header('Location: ../view/VConnexion.php');

        // Récupération des données du formulaire d'inscription
        if (!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $mdp = sha1($_POST['mdp']);

            // Trouve l'utilisateur correspondant au paramètre utilisateur
            $req = $this->pdo->prepare('SELECT * FROM utilisateur WHERE username = :pseudo');
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
        } else
            $erreur = 'Formulaire de connexion incomplet.';
    }
}

?>
