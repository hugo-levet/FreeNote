<?php
$titre = 'discussion';
$ajoutHead = '';
require_once('template/base.php');
startPage();
?>
        <h1><?= $controller->getDiscussion()->getTitre(); ?></h1>

        <?php
        if($controller->getDiscussion()->isOuvert())
        {
            echo "<h2>Discussion ouverte.</h2>";
        }
        else
        {
            echo "<h2>Discussion fermée.</h2>";
        }
        ?>
        <div>
            <?php

            for ($i = 0; $i < count($controller->getDiscussion()->getMessages()); $i++)
            {
                echo '<br>';
                for ($j = 0; $j < count($controller->getDiscussion()->getMessage($i)->getMots()); $j++)
                {
                    echo $controller->getDiscussion()->getMessage($i)->getMot($j)->getvaleur() . ' ';
                }
            }
            ?>
        </div>

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
endPage();
?>
