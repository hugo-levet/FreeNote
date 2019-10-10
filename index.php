<?php
try
{
    //dirige vers le bon controlleur
    if(isset($_GET['url']))
    {
        $url = explode("/", $_GET['url']);
        $classController = 'C' . ucfirst(strtolower($url[0]));
        $fichierController = './controller/' . $classController . '.php';
        if(file_exists($fichierController))
        {
            require_once($fichierController);
            $controller = new $classController($url);
        }
        else
        {
            throw new Exception('Page introuvable');
        }
    }
    else
    {
        require_once('./controller/CAccueil.php');
        $controller = new CAccueil();
    }
}
catch(Exception $e)
{
    $messageErreur = $e->getMessage();
    require_once('./controller/CErreur.php');
    $controller = new CErreur($messageErreur);
}
?>
