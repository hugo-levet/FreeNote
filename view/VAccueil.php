<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>accueil</title>
    </head>
    <body>
    <!--description du service-->
    <p>ce site internet est un site de chat... (a developper)</p>


<?php
//on calcul la premiere entree a lire dans la table ex: (2 - 1) * 2 = premiere entrée 0,1,[2],3,4, ...
$premiereEntree = ($controller->getPageActuelle() - 1) * $controller->getNbDiscussionParPage();

//boucle pour qui lit le tableau de messages selon les messages de la page courante
for($i = $premiereEntree; $i <= ($premiereEntree + $controller->getNbDiscussionParPage())-1; $i++)
{
    //titre du message[i] a afficher
    $titre = $controller->getTableToutesDiscussions()->getTitre($i);

    //statut du message[i]
    $statut = $controller->getTableToutesDiscussions()->getStatut($i);
    if($statut)
        $statut = 'Ouvert';
    else
        $statut = 'Fermée';

    //table de presentation du message courant
    echo '<table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                     <td><strong>discussion: '.stripslashes($titre).'</strong></td>
                </tr>
                <tr>
                     <td>statut: '.($statut).'</td>
                </tr>
            </table><br /><br />'; //saut a la ligne
}

echo '<p align="center">Page : '; //Pour l'affichage, on centre la liste des pages
for($i = 1; $i <= $controller->getNbPages(); $i++) //On fait notre boucle
{
    //On va faire notre condition
    if($i == $controller->getPageActuelle()) //Si il s'agit de la page actuelle
    {
        echo ' [ '.$i.' ] ';
    }
    else
    {
        echo '<a href="?page='.$i.'">'.$i.'</a>';
    }
    echo' ';
}
echo '</p>';
?>
    </body>
</html>
