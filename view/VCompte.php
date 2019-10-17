<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Compte</title>
    </head>
    <body>
        <!-- information sur l'utilisateur -->
        <p>pseudo : <?= $controller->getPseudo() ?>  <a href="#">modifier</a></p>
        <p>mail : <?= $controller->getMail() ?>  <a href="#">modifier</a></p>

        <!-- Modifier de mot de passe -->
        <form method="post" action="#">
            <div>
                <label for="ancienMdp">Ancien mot de passe :</label><input type="password" name="ancienMdp">
            </div>
            <div>
                <label for="ancienMdp">Nouveau mot de passe :</label><input type="password" name="nouveauMdp">
            </div>
            <div>
                <label for="nouveauMdpBis">Répéter votre mot de passe :</label><input type="password" name="nouveauMdpBis">
            </div>
            <button type="submit" name="action" value="modificationMdp">modifier</button>
        </form>
    </body>
</html>
