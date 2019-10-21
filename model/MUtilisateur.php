<?php
require_once('model/MModel.php');
class MUtilisateur extends MModel
{
    protected $id;
    private $pseudo;
    private $mail;
    private $mdp;
    private $role;

    function __construct($id)
    {
        $this->table = 'utilisateur';
        //si l'id est un nombre
        if (is_numeric($id))
        {
            $this->id = $id;
            $this->connexionBdd();
            $tuple = $this->getUnTuple($this->id);
        }
        //sinon crée l'utilisateur par son pseudo (qui est unique)
        else
        {
            $this->pseudo = $id;
            $this->connexionBdd();
            $tuple = $this->getUnTupleParPseudo($this->pseudo);
        }
    }

    public function hydrate(array $data)
    {
        $this->id = $data['idutilisateur'];
        $this->pseudo = $data['pseudo'];
        $this->mail = $data['mail'];
        $this->mdp = $data['mdp'];
        $this->role = $data['role'];
    }

    //SETTERS
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    public function setMdp($mdp)
    {
        $this->mdp = md5($mdp);
        $this->changementMdp($this->mdp);
    }

    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    public function changeRole()
    {
        if($this->role == 'membre')
        {
            $this->role = 'admin';
        }
        else
        {
            $this->role = 'membre';
        }
    }

    //GETTERS
    public function getId()
    {
        return $this->id;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function getMdp()
    {
        return $this->mdp;
    }
}
?>
