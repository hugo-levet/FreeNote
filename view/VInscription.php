<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Inscription</title>
    </head>
    <body>
        <form method="post" action="<?= $controller->getUrlIci(); ?>">
            <div>
                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo" required>
            </div>
            <div>
                <label for="mail">Pseudo</label>
                <input type="email" name="mail" required>
            </div>
            <div>
                <label for="mdp">Mot de passe</label>
                <input type="password" name="mdp" required>
            </div>
            <div>
                <label for="mdp2">Confirmez le mot de passe</label>
                <input type="password" name="mdp2" required>
            </div>
            <div>
                <button type="submit" name="inscription" value="inscription">S'inscrire</button>
            </div>
        </form>
        <a href="VConnexion.php">Déjà un compte ? Se connecter</a>
    </body>
</html>
