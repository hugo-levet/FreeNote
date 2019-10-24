<!DOCTYPE html>
<html lang="fr">
    <head>
        <script language="javascript" type="text/javascript">
            function popup(){
                alert("<?php echo htmlspecialchars('Nous vous avons envoyé un e-mail avec votre nouveau mot de passe.', ENT_QUOTES); ?>")
            }
        </script>
        <meta charset="UTF-8">
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
                <button onclick="popup()" type="submit" value="envoyer">Mot de passe perdu ?</button>
            </div>
            <div>
                <button type="submit" name="connexion" value="connexion">Se connecter</button>
            </div>
        </form>
        <a href="inscription.php">S'inscrire</a>
    </body>
</html>
