<?php
$titre = 'discussion';
$ajoutHead = '';
require_once('template/base.php');
startPage();
?>

<?php
if($_GET['type'] == 'mdp')
    echo 'Un mot de passe temporaire vous seras envoyé par mail, veuillez le remplacer dès que possible.';
elseif ($_GET['type'] == 'pseudo')
    echo 'Votre pseudo vous seras envoyé par mail.';
?>

<form method="post" action="<?= $controller->getUrlIci(); ?>">
    <div>
        <label for="mail">EMail</label>
        <input type="email" name="mail" required>
    </div>
    <div>
        <button type="submit" name="envoyer" value="envoyer">S'inscrire</button>
    </div>
</form>

