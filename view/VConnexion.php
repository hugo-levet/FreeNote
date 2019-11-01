<?php
$titre = 'connexion';
$ajoutHead = '';
$ajoutHead = '<script language="javascript" type="text/javascript">
                function popup(){
                alert("' . htmlspecialchars('Un email contenant votre nouveau mot de passe vous a été envoyé.', ENT_QUOTES) . '")
                }
              </script>';
require_once('template/base.php');
startPage();
?>
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
<?php
endPage();
?>
