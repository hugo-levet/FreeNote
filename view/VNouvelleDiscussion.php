<?php
$titre = 'nouvelle discussion';
$ajoutHead = '';
require_once('template/base.php');
startPage();
?>
<form method="post" action="<?= $controller->getUrlIci(); ?>">
    <label for="titre">Titre</label>
    <input type="text" name="titre" required>
    <button type="submit" name="nouvelleDiscussion" value="nouvelleDiscussion">Créer</button>
</form>
<?php
endPage();
?>
