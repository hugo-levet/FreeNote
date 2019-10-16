<?php

include_once('config.php');

class CInscription
{
    private $pdo;
    private $pseudo;
    private $mail;
    private $mdp;
    private $mdp_crypte;
    private $cle_de_cryptage = PASSWORD_ENCRYPTION_KEY;

    public function __construct(PDO $pdo)
    {
        require_once('view/VInscription.php');
        $this->pdo = $pdo;
    }

    public function inscription()
    {
        if (isset($_POST['forminscription'])) {
            // Récupération des données du formulaire
            if (!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {
                $pseudo = htmlspecialchars($_POST['pseudo']);
                $mail = htmlspecialchars($_POST['mail']);
                $mdp = sha1($_POST['mdp']);
                $mdp2 = sha1($_POST['mdp2']);

                $longueur_pseudo = strlen($pseudo);
                if (3 <= $longueur_pseudo <= 24) {
                    if ($mdp === $mdp2) {
                        $insertion = $pdo->('INSERT INTO Utilisateurs(pseudo, mail, mdp) VALUES(?, ?, ?)');
                        $insertion->execute(array($pseudo, $mail, $mdp));
                        $erreur = 'Compte créé.';
                        header('Location: ../view/VConnexion.php');
                    } else
                        $erreur = 'Les mots de passe ne correspondent pas.';
                } else
                    $erreur = 'Pseudonyme invalide.';
            } else
                $erreur = "Formulaire d'inscription incomplet.";
        } else
            header('Location: ../view/VInscription.php');
    }
}

?>
