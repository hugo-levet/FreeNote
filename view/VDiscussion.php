<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>FreeNote</title>
    <!-- scripts -->
    <script src="https://kit.fontawesome.com/66ecd38112.js" crossorigin="anonymous"></script>
    <!-- fichiers inclus -->
    <link rel="import" href="../controller/CDiscussion.php">
</head>
<body>
    <h1><?= $controller->getDiscussion()->getTitre() ?></h1>
    <form action="message" method="post">
        <input type="text" name="mot" maxlength="52"/>
        <button name="envoyer"><i class="fab fa-telegram-plane"></i></button>
    </form>
</body>
</html>
