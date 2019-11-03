<?php
$titre = 'discussion';
$ajoutHead = '';
require_once('template/base.php');
startPage();
?>

<?php
if($_GET['type'] == 'mdp')
    echo 'Un mot de passe temporaire vous sera envoyé par mail, veuillez ensuite à le modifier dès que possible.';
elseif ($_GET['type'] == 'pseudo')
    echo 'Votre pseudo vous sera envoyé par mail.';
?>

<form method="post" action="<?= $controller->getUrlIci(); ?>">
    <div>
        <label for="mail">Mail</label>
        <input type="email" name="mail" required>
    </div>
    <div>
        <button type="submit" name="envoyer" value="envoyer">S'inscrire</button>
    </div>
</form>
