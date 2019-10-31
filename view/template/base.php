<?php
function startPage()
{
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <?php
    if($GLOBALS['titre'] == '')
    {
        ?>
        <title>FreeNote</title>
        <?php
    }
    else
    {
        ?>
        <title>FreeNote - <?= $GLOBALS['titre'] ?></title>
        <?php
    }
        ?>

        <!-- CSS -->
        <link rel="stylesheet" href="<?= $GLOBALS['controller']->getRetourRacine() ?>public/css/style.css">

        <!-- FONTAWESOME -->
        <script src="https://kit.fontawesome.com/66ecd38112.js" crossorigin="anonymous"></script>


        <?php
    if($GLOBALS['ajoutHead'] != '')
    {
        echo $GLOBALS['ajoutHead'];
    }
        ?>

    </head>
    <body>
        <header>
            <a href="<?= $GLOBALS['controller']->getRetourRacine() ?>accueil/1" title="retour accueil">FreeNote</a>
            <nav>
                <?php
            if($GLOBALS['titre'] != 'connexion' || $GLOBALS['titre'] != 'inscription')
            {
                ?>
                <?php if($GLOBALS['controller']->isConnecte())
                {
                ?>
                <a href="<?= $GLOBALS['controller']->getRetourRacine() ?>compte" ><?=  $GLOBALS['controller']->getUtilisateurActuel()->getPseudo() ?></a>
                <form action="./" method="post">
                    <button type="submit" name="deconnexion" value="deconnexion">se deconnecter</button>
                </form>
                <?php
                }
                else
                {
                ?>
                <a href="../connexion/">se connecter</a>
                <?php
                }
            }
                ?>
            </nav>
        </header>
        <?php
}

function endPage()
{ ?>
    </body>
</html>
<?php
}

?>
