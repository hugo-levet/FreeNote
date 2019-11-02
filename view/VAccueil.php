<?php
$titre = 'accueil';
$ajoutHead = '<link rel="stylesheet" href="'.$controller->getRetourRacine().'public/css/accueil.css">';
require_once('template/base.php');
startPage();
?>
<!--description du service-->
<p>ce site internet est un site de chat... (a developper)</p>

<?php
/*bouton de création de discussion*/
if($controller->isConnecte())
{
?>
<a href="<?= $controller->getRetourRacine(); ?>nouvelleDiscussion" >Ajouter une discussion <i class="far fa-comments"></i></a>
<?php
}
?>

<div id="discussions">
    <?php
    //on calcul la premiere entree a lire dans la table ex: (2 - 1) * 2 = premiere entrée 0,1,[2],3,4, ...
    $premiereEntree = ($controller->getPageActuelle() - 1) * $controller->getNbDiscussionParPage();

    //boucle pour qui lit le tableau de messages selon les messages de la page courante
    for($i = $premiereEntree; $i <= ($premiereEntree + $controller->getNbDiscussionParPage())-1; $i++)
    {
        if($i <= $controller->getNbDiscussion()-1 )
        {
            //titre du message[i] a afficher
            $id = $controller->getTableToutesDiscussions()->getId($i);

            //titre du message[i] a afficher
            $titre = $controller->getTableToutesDiscussions()->getTitre($i);

            //statut du message[i]
            $statut = $controller->getTableToutesDiscussions()->getStatut($i);
            if($statut)
                $statut = 'ouvert';
            else
                $statut = 'fermee';

            //table de presentation du message courant
    ?>
    <a href="../discussion/' . ($id) . '"><div id="uneDiscussion" class="<?= $statut; ?>">
        <h2><?= stripslashes($titre); ?></h2>
<!--        <a href="../discussion/' . ($id) . '">ouvrir</a>-->
        </div></a>
    <?php
        }
    }?>
</div>

<form method="get" action="CAccueil.php">
    <label>
        "Afficher "
        <select name="nbDiscParPage" aria-controls="eventTable">
            <option value="2">2</option>
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="25">25</option>
        </select> "éléments"
    </label>
    <button type="submit" name="discParPage" value="discParPage"><i class="fas fa-sort-amount-down"></i></button>

</form>
<?php
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
        echo '<a href="./'.$i.'">'.$i.'</a>';
    }
    echo' ';
}
echo '</p>';
?>
<?php
endPage();
?>
