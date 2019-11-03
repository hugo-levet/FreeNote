<?php
$titre = 'discussion';
$ajoutHead = '<link rel="stylesheet" href="'.$controller->getRetourRacine().'public/css/discussion.css">';

require_once('template/base.php');

startPage();
?>
<h1><?= $controller->getDiscussion()->getTitre(); ?></h1>

<?php
if($controller->isConnecte() && $controller->getUtilisateurActuel()->getRole() == 'admin')
{
?>
    <form action="../discussion/<?= $controller->getDiscussion()->getId(); ?>" method="post">
        <button type="submit" name="suppressionDiscussion" value="suppressionDiscussion">Supprimer la discussion</button>
    </form>
    <form action="../discussion/<?= $controller->getDiscussion()->getId(); ?>" method="post">
        <button type="submit" name="clotureDiscussion" value="clotureDiscussion">Clore la discussion</button>
    </form>
<?php
}
?>

<div id="messages">
    <?php //affichage de la discussion
    for ($i = 0; $i < count($controller->getDiscussion()->getMessages()); $i++)
    {
        echo '<div id="unMessage">';

        if($controller->isConnecte() && $controller->getUtilisateurActuel()->getRole() == 'admin' && $i < count($controller->getDiscussion()->getMessages())-1)
        {
    ?>
            <form action="../discussion/<?= $controller->getDiscussion()->getId(); ?>" method="post">
                <button type="submit" name="suppressionMessage" value="<?= $controller->getDiscussion()->getMessage($i)->getId() ?>"><i class="far fa-trash-alt"></i></button>
            </form>
        <?php
        }
        echo '<p>';
        for ($j = 0; $j < count($controller->getDiscussion()->getMessage($i)->getMots()); $j++)
        {
            echo $controller->getDiscussion()->getMessage($i)->getMot($j)->getvaleur() . ' ';
        }
        echo '</p></div>';
    }
    ?>
</div>

<?php //affichage des option de modification de discussion
if($controller->getDiscussion()->isOuvert())
{
?>
    <?php
    if($controller->isConnecte())
    {
        if($controller->getDiscussion()->getMessage(count($controller->getDiscussion()->getMessages())-1)->aParticipe($controller->getIdUtilisateurActuel()))
        {
    ?>
            <form action="../discussion/<?= $controller->getDiscussion()->getId(); ?>" method="post">
                <button type="submit" name="clotureMessage" value="clotureMessage"><i class="far fa-times-circle"></i></button>
            </form>
        <?php
        }
        else
        {
        ?>
            <form action="../discussion/<?= $controller->getDiscussion()->getId(); ?>" method="post">
                <input type="text" name="mot" maxlength="52" required />
                <button type="submit" name="ajoutMot" value="ajoutMot"><i class="fab fa-telegram-plane"></i></button>
            </form>
    <?php
        }
    }
    else
    {
     ?>
    <p>Connectez-vous pour participer aux différentes discussions.</p>
    <?php
    }
    ?>

<?php
}
else
{
?>
    <p>Cette discussion est fermée.</p>
<?php
}

endPage();
?>
