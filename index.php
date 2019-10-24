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
        $messageErreur = $e->getMessage();
        require_once('./controller/CErreur.php');
        $controller = new CErreur($url, $messageErreur);
        require_once('./view/VErreur.php');
    }
}
else
{
    header('Location: accueil/1');
//    require_once('./controller/CAccueil.php');
//    $controller = new CAccueil();
//    require_once('./view/VAccueil.php');
}
?>
