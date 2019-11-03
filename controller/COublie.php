<?php

require_once('controller/CController.php');

class COublie extends CController
{
    private $urlRetourDebut = '';
    private $urlRetourFin = '';
    private $urlRetour;
    private $urlIci;


    public function getUrlIci()
    {
        $this->urlIci;
    }
}
