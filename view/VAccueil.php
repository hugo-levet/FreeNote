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
    $messagesParPage = 2; //nb de messages par pages

    //ouvrir une connexion sql
    $retour_total = mysql_query('SELECT COUNT (*) AS total FROM discussion'); // recuperer le contenu de discussion
    $donnees_total = mysql_fetch_assoc($retour_total); //mettre tout sous la forme d'un tableau
    $total = $donnees_total['total']; //on recupere le total pour le placer dans la variable $total

    //on compte de nombre de pages
    $nombreDePages = ceil($total/$messagesParPage);

    if(isset($_GET['page'])) //si $_GET['page'] existe
    {
        $pageActuelle = intval($_GET['page']);

        if($pageActuelle > $nombreDePages) //si la valeur de $pageActuelle est plus grand que $nombreDePages
        {
            $pageActuelle = $nombreDePages;
        }
    }
    else
    {
        $pageActuelle = 1;
    }

    $premiereEntree = ($pageActuelle - 1) * $messagesParPage; //on calcul la premiere entree a lire

    //la requete sql pour recuperer les messages de la page actuelle
    $retour_messages = mysql-query('SELECT * FROM discussion ORDER BY iddisc DESC LIMIT'.$premiereEntree.', '.$messagesParPage.'');

    while($donnees_messages = mysql_fetch_assoc($retour_messages)) //on lit les entrées une a une grace a une boucle
    {


        echo '<table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                     <td><strong>Ecrit par : '.stripslashes($donnees_messages['pseudo']).'</strong></td>
                </tr>
                <tr>
                     <td>'.nl2br(stripslashes($donnees_messages['message'])).'</td>
                </tr>
            </table><br /><br />'; //saut a la ligne
    }

    echo '<p align="center">Page : '; //Pour l'affichage, on centre la liste des pages
    for($i = 1; $i <= $nombreDePages; $i++) //On fait notre boucle
    {
        //On va faire notre condition
        if($i == $pageActuelle) //Si il s'agit de la page actuelle...
        {
            echo ' [ '.$i.' ] ';
        }
        else //Sinon...
        {
            echo '<a href="livredor.php?page='.$i.'">'.$i.'</a>';
        }
    }
    echo '</p>';
    ?>
    


    <ul id="pagination-flickr">
        <li class="previous-off">« Précédent</li>
        <li class="active">1</li>
        <li><a href="">3</a></li>
        <li><a href="">5</a></li>
        <li><a href="">7</a></li>
        <li><a href="">9</a></li>
        <li><a href="">11</a></li>
        <li class="next"><a href="/?page=2">Suivant »</a></li>
    </ul>


    </body>
</html>
