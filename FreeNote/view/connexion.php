<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>connexion</title>
    </head>
    <body>
        <form method="post" action="../controller/verificationConnexion.php">
            <div>
                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo" required>
                <a href="pseudo_perdu.php">Pseudo perdu ?</a>
            </div>
            <div>
                <label for="mdp">Mot de passe</label>
                <input type="password" name="mdp" required>
                <a href="mdp_perdu.php">Mot de passe perdu ?</a>
            </div>
            <div>
                <button type="submit" name="action" value="connexion">Se connecter</button>
            </div>
        </form>
        <a href="inscription.php">S'inscrire</a>
    </body>
</html>
