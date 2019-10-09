<?php
    require_once 'ressources/utils.inc.php';
    start_page('discussion');
    require '../controller/affichageDiscussion.php';
?>
    <form action="", method="post">
        <input type="text" name="mot"/>
        <button name="envoyer"><i class="fab fa-telegram-plane"></i></button>
    </form>
<?php end_page(); ?>
