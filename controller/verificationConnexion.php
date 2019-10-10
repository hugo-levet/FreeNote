<?php
//session_start();
if (!isset($_POST['action']))
{
     header('Location: ../view/connexion.php');
}
$action = $_POST['action'];
$pseudo = $_POST['pseudo'];
$mdp = $_POST['mdp'];
if($_POST['action'] == 'connexion')
{
    echo '<br/><strong>Bouton géré !</strong><br/>';
}
else
{
    echo '<br/><strong>Bouton non géré !</strong><br/>';
}
?>
