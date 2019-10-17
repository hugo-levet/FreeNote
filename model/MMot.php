<?php
require_once ('model/MModel.php');
class MMot extends MModel {
    protected $id;
    protected $idMessage;
    protected $idUtilisateur;
    protected $valeur;

    function __construct($id)
    {
        $this->id = $id;
        $this->table = 'mot';
        $this->connexionBdd();
        $tuple = $this->getUnTuple($this->id);
        $this->hydrate($tuple);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getIdMessage()
    {
        return $this->idMessage;
    }

    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    public function getValeur()
    {
        return $this->valeur;
    }

    public function setValeur($valeur)
    {
        $this->valeur = $valeur;
    }
}
?>
