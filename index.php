<?php
$controller;
//dirige vers le bon controlleur
if(isset($_GET['url']))
{
    $url = explode("/", $_GET['url']);
    $classController = 'C' . ucfirst(strtolower($url[0]));
    $view = 'V' . ucfirst(strtolower($url[0]));
    $fichierController = './controller/' . $classController . '.php';
    $fichierView = './view/' . $view . '.php';
    try
    {
<<<<<<< HEAD
        $url = explode("/", $_GET['url']);
        $classController = 'C' . ucfirst(strtolower($url[0]));
        $fichierController = 'controller/' . $classController . '.php';
=======
>>>>>>> 300a093bad7d0af1eeea7cd6498ce0beec436f24
        if(file_exists($fichierController))
        {
            require_once($fichierController);
            $controller = new $classController($url);
            require_once($fichierView);
        }
        else
        {
            throw new Exception('Page introuvable');
        }
    }
    catch(Exception $e)
    {
<<<<<<< HEAD
        require_once('controller/CAccueil.php');
=======
        $messageErreur = $e->getMessage();
        require_once('./controller/CErreur.php');
        $controller = new CErreur($url, $messageErreur);
        require_once('./view/VErreur.php');
>>>>>>> 300a093bad7d0af1eeea7cd6498ce0beec436f24
    }
}
else
{
    require_once('./controller/CAccueil.php');
    $controller = new CAccueil();
    require_once('./view/VAccueil.php');
}
?>
