<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Erreur :c</title>
    </head>
    <body>
        <p>Oups, il y a un petit problème : <?= $controller->getMessage() ?></p>

        <a href="<?= $controller->getRetourAccueil() ?>" >Tu peux retourner a l'accueil ;D</a>
    </body>
</html>
