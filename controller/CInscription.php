<?php

require_once('model/MUtilisateur.php');
require_once('controller/CController.php');
require_once('model/MUtilisateurManageur.php');

class CInscription extends CController
{
    private $urlRetourDebut = '';
    private $urlRetourFin = '';
    private $urlRetour;
    private $urlIci;

    function __construct($arg)
    {
        $this->autoConnexion();

        foreach ($arg as $key => $p) {
            if ($key >= 1)
                $this->urlRetourDebut .= '../';

            if ($key != 0) {
                if ($key <= 1)
                    $this->urlRetourFin .= strval($p);
                else
                    $this->urlRetourFin .= '/' . strval($p);
            }
        }
        $this->urlIci = $this->urlRetourDebut . 'inscirption/' . $this->urlRetourFin;
        $this->urlRetour = $this->urlRetourDebut . $this->urlRetourFin;

        if($this->isConnecte())
            header("location: ./$this->urlRetour");

        //vérifie si on viens de se connecter
        if(!empty($_POST['inscription']))
        {
            $this->verificationInscription();
        }
    }

    function verificationInscription()
    {
        if (isset($_POST['pseudo'], $_POST['mail'], $_POST['mdp'], $_POST['mdp2'])) {
            if ($_POST['mdp'] == $_POST['mdp2']) {
                if (6 <= strlen($_POST['mdp'])) {
                    $mdp_crypte = md5($_POST['mdp']);
                    if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
                        $longueur_pseudo = strlen($_POST['pseudo']);
                        if (3 <= $longueur_pseudo && $longueur_pseudo <= 24) {
                            if (preg_match('/.*[a-z]+.*/', $_POST['pseudo']) != 0) {
                                $utilisateur = new MUtilisateurManageur();
                                $utilisateur->ajouterUtilisateur($_POST['pseudo'], $_POST['mail'], $mdp_crypte);
                                header("location: $this->urlRetour");
                            } else
                                echo 'Le pseudonyme doit au moins contenir une lettre.';
                        } else
                            echo 'La taille du pseudonyme est incorrecte.';
                    } else
                        echo 'L\'adresse mail est invalide.';
                } else
                    echo 'Veuillez entrer un mot de passe d\'au moins 6 caractères.';
            } else
                echo 'Les mots de passe ne correspondent pas.';
        } else
            echo 'Formulaire d\'inscription incomplet.';
    }

    public function getUrlIci()
    {
        $this->urlIci;
    }
}

?>
