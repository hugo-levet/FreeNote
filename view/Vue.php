<?php

class Vue
{
    private $_file;
    private $_t;

    public function __construct($action)
    {
        $this->_file = 'view/V' . $action . 'php';
    }

    // Génère et affiche la vue
    public function generate($data)
    {
        $content = $this->generateFile($this->_file, $data);

        $view = $this->generateFile('view/template.php', array('t' => $this->t, 'content' => $content));

        echo $view;
    }

    // Génère un fichier vue et renvoie le résultat produit
    private function generateFile($file, $data)
    {
        if (file_exists($file))
        {
            extract($data);

            ob_start();

            require $file;

            return ob_get_clean();
        }
        else
        {
            throw new Exception('Fichier '.$file.' introuvable');
        }
    }
}
