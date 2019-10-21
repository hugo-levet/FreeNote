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

        <!-- Modifier de pseudo -->
        <form method="post" action="#">
            <fieldset>
                <legend>modification pseudo</legend>
                <div>
                    <label for="ancienPseudo">Ancien pseudo : <?php $controller->getUtilisateur()->getPseudo() ?></label>
                </div>
                <div>
                    <label for="nouveauPseudo">Nouveau Pseudo :</label><input type="text" name="nouveauPseudo">
                </div>
                <button type="submit" name="modificationPseudo" value="modificationPseudo">modifier</button>
            </fieldset>
        </form>

        <!-- Modifier de Mail -->
        <form method="post" action="#">
            <fieldset>
                <legend>modification mail</legend>
                <div>
                    <label for="ancienMdp">Ancien mail : <?php $controller->getUtilisateur()->getMail() ?></label>
                </div>
                <div>
                    <label for="nouveauMail">Nouveau mail :</label><input type="email" name="nouveauMail">
                </div>
                <button type="submit" name="modificationMail" value="modificationMail">modifier</button>
            </fieldset>
        </form>

    </body>
</html>
