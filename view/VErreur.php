<?php
$titre = 'accueil';
$ajoutHead = '<link rel="stylesheet" href="'.$controller->getRetourRacine().'public/css/erreur.css">';
require_once('template/base.php');
startPage();
?>
<div class="msg">
    <img src = "public/images/ErrorT-REX.png">
    <p1>Oups, il y a un petit problème : </p1> <p2> <?= $controller->getMessage() ?></p2>
</div>
</br>
<div class="bouton">
    <a href="<?= $controller->getRetourAccueil() ?>" >Tu peux retourner a l'accueil ;D</a>
</div>
<?php
    endPage();
?>
