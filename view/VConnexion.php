<?php
$titre = 'connexion';
$ajoutHead = '';
$ajoutHead = '<script language="javascript" type="text/javascript">
                function popup(){
                alert("' . htmlspecialchars('Oups il semblerait que cette partie du site soit encore en chantier ! veuillez réessayer plus tard', ENT_QUOTES) . '")
                }
              </script>';

require_once('template/base.php');

startPage();
?>
        <form method="post" action="<?= $controller->getUrlIci(); ?>">
            <div>
                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo" required>
                <a href="pseudo_perdu.php" onclick="popup()">Pseudo perdu ?</a>
            </div>
            <div>
                <label for="mdp">Mot de passe</label>
                <input type="password" name="mdp" required>
            </div>
            <div>
                <button type="submit" name="connexion" value="connexion">Se connecter</button>
                <button onclick="popup()" type="submit" value="envoyer">Mot de passe perdu ?</button>
            </div>
        </form>
        <a href="inscription">S'inscrire</a>
<?php
endPage();
?>
