<?php
$titre = 'accueil';
$ajoutHead = '';

require_once('template/base.php');

startPage();
?>
<p>Oups, il y a un petit problème : <?= $controller->getMessage() ?></p>

<a href="<?= $controller->getRetourAccueil() ?>" >Tu peux retourner a l'accueil ;D</a>
<?php
    endPage();
?>
