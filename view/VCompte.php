<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Compte</title>
    </head>
    <body>
        <!-- information sur l'utilisateur -->
        <p>pseudo : <?= $controller->getUtilisateur()->getPseudo() ?>  <a href="#">modifier</a></p>
        <p>mail : <?= $controller->getUtilisateur()->getMail() ?>  <a href="#">modifier</a></p>

        <!-- Modifier de mot de passe -->
        <form method="post" action="#">
            <fieldset>
                <legend>modification mot de passe</legend>
                <div>
                    <label for="ancienMdp">Ancien mot de passe :</label><input type="password" name="ancienMdp">
                </div>
                <div>
                    <label for="nouveauMdp">Nouveau mot de passe :</label><input type="password" name="nouveauMdp">
                </div>
                <div>
                    <label for="nouveauMdpBis">Répéter votre mot de passe :</label><input type="password" name="nouveauMdpBis">
                </div>
                <button type="submit" name="modificationMdp" value="modificationMdp">modifier</button>
            </fieldset>
        </form>
    </body>
</html>
