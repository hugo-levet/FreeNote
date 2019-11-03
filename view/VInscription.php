<?php
$titre = 'inscription';
$ajoutHead = '';

require_once('template/base.php');

startPage();
?>
        <form method="post" action="<?= $controller->getUrlIci(); ?>">
            <div>
                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo" required>
            </div>
            <div>
                <label for="mail">Mail</label>
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
        <a href="connexion">Déjà un compte ? Se connecter</a>
<?php
endPage();
?>
