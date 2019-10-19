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
        <h1><?= $controller->getDiscussion()->getTitre(); ?></h1>
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
            echo 'nombre de messages : ' . count($controller->getDiscussion()->getMessages()) . '<br><br>contenues : <br>';

            for ($i = 0; $i < count($controller->getDiscussion()->getMessages()); $i++)
            {
                    echo $controller->getDiscussion()->getMessage($i)->getStatut() . ' ';
                for ($j = 0; $j < count($controller->getDiscussion()->getMessage($i)->getMots()); $j++)
                {
//                    echo $controller->getMessage($i)->getStatut() . '<br>';
                    echo $controller->getDiscussion()->getMessage($i)->getMot($j)->getvaleur() . ' ';
                }
                echo '<br>';
            }


            ?>
        </div>
        <form action="message" method="post">
            <input type="text" name="mot" maxlength="52"/>
            <button name="envoyer"><i class="fab fa-telegram-plane"></i></button>
        </form>
    </body>
</html>
