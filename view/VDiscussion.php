<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>FreeNote</title>
        <!-- scripts -->
        <script src="https://kit.fontawesome.com/66ecd38112.js" crossorigin="anonymous"></script>
        <!-- fichiers inclus -->
        <link rel="import" href="../controller/CDiscussion.php">
    </head>
    <body>
        <?php if($controller->isConnecte()) { ?>


        <form action="../discussion/<?= $controller->getDiscussion()->getId(); ?>" method="post">
            <button type="submit" name="deconnexion" value="deconnexion">se deconnecter</button>
        </form>
        <?php } else { ?>
        <a href="../connexion/discussion/<?= $controller->getDiscussion()->getId(); ?>">se connecter</a>
        <?php } ?>

        <h1><?= $controller->getDiscussion()->getTitre(); ?></h1>

        <p>YOUHOUUUUU</p>
        <?php
        if($controller->getDiscussion()->isOuvert())
        {
            echo "<h2>Discussion ouverte.</h2>";
        }
        else
        {
            echo "<h2>Discussion fermé.</h2>";
        }
        ?>
        <div>
            <?php

            for ($i = 0; $i < count($controller->getDiscussion()->getMessages()); $i++)
            {
                echo '<br>';
                echo $controller->getDiscussion()->getMessage($i)->getStatut() . ' ';
                for ($j = 0; $j < count($controller->getDiscussion()->getMessage($i)->getMots()); $j++)
                {
                    //                    echo $controller->getMessage($i)->getStatut() . '<br>';
                    echo $controller->getDiscussion()->getMessage($i)->getMot($j)->getvaleur() . ' ';
                }
            }


            ?>
        </div>

        <form action="../discussion/<?= $controller->getDiscussion()->getId(); ?>" method="post">
            <button type="submit" name="clotureMessage" value="clotureMessage"><i class="far fa-times-circle"></i></button>
        </form>

        <?php if($controller->isConnecte()) { ?>
        <form action="../discussion/<?= $controller->getDiscussion()->getId(); ?>" method="post">
            <input type="text" name="mot" maxlength="52" required />
            <button type="submit" name="ajoutMot" value="ajoutMot"><i class="fab fa-telegram-plane"></i></button>
        </form>
        <?php } ?>
    </body>
</html>
