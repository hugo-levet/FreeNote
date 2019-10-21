<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>connexion</title>
    </head>
    <body>
        <form method="post" action="<?= $controller->getUrlIci(); ?>">
            <div>
                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo" required>
                <a href="pseudo_perdu.php">Pseudo perdu ?</a>
            </div>
            <div>
                <label for="mdp">Mot de passe</label>
                <input type="password" name="mdp" required>
<<<<<<< HEAD
                <a href="./nouveauMdp">Mot de passe perdu ?</a>
=======
                <a href="mdp_perdu.php">Mot de passe perdu ?</a>
>>>>>>> a4696fc9f790bf89cda78e361c119f201093d1ea
            </div>
            <div>
                <button type="submit" name="connexion" value="connexion">Se connecter</button>
            </div>
        </form>
        <a href="inscription.php">S'inscrire</a>
    </body>
</html>
