<?php
$titre = 'discussion';
$ajoutHead = '';
require_once('template/base.php');
startPage();
?>
<h1><?= $controller->getDiscussion()->getTitre(); ?></h1>

<?php
if($controller->getUtilisateurActuel()->getRole() == 'admin')
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

<div>
    <?php //affichage de la discussion
    for ($i = 0; $i < count($controller->getDiscussion()->getMessages()); $i++)
    {
        echo '<br>';
        for ($j = 0; $j < count($controller->getDiscussion()->getMessage($i)->getMots()); $j++)
        {
            echo $controller->getDiscussion()->getMessage($i)->getMot($j)->getvaleur() . ' ';
        }

        if($controller->getUtilisateurActuel()->getRole() == 'admin' && $i < count($controller->getDiscussion()->getMessages())-1)
        {
    ?>
    <form action="../discussion/<?= $controller->getDiscussion()->getId(); ?>" method="post">
        <button type="submit" name="suppressionMessage" value="<?= $controller->getDiscussion()->getMessage($i)->getId() ?>">Supprimer le message</button>
    </form>
    <?php
        }
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
?>

<?php
}
else
{
?>
<p>Cette discussion est fermée.</p>
<?php
}
?>
<?php
endPage();
?>
