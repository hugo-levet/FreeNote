<?php
class CAccueil{
    private discussion = []

    function __construct()
    {
        require_once('view/VAccueil.php');
        echo 'accueil';
    }
}
?>

<?php
require_once('model/MBaseDeDonnees.php');

$messagesParPage = 2; //nb de messages par pages
$bdd = new MBaseDeDonnees();
$tableToutesDiscussions = getToutesDiscussions(); //recuperer le contenu de discussion ->
$nbDiscussion = count($tableToutesDiscussions);


//on compte de nombre de pages
$nbPages = ceil($nbDiscussion/$messagesParPage);

//si (pageActulelle  > nbPages) pageActuelle = nbPages
if(isset($_GET['page'])) //si $_GET['page'] existe
{
    $pageActuelle = intval($_GET['page']);

    if($pageActuelle > $nbPages) //si la valeur de $pageActuelle est plus grand que $nbPages
    {
        $pageActuelle = $nbPages;
    }
}
else
{
    $pageActuelle = 1;
}

$premiereEntree = ($pageActuelle - 1) * $messagesParPage; //on calcul la premiere entree a lire dans la table ex: (2 - 1) * 2 = premiere entrée 0,1,[2],3,4, ...

//la requete sql pour recuperer les messages de la page actuelle -> a faire dans MBaseDeDonnee
$retour_messages = for($i = $premiereEntree; $i <= ($premiereEntree + $messagesParPage); $i++ ) mysql_query('SELECT * FROM discussion ORDER BY iddisc DESC LIMIT'.$premiereEntree.', '.$messagesParPage.'');

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
for($i = 1; $i <= $nbPages; $i++) //On fait notre boucle
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