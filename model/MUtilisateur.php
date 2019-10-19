<?php
require_once('model/MModel.php');
class MUtilisateur extends MModel
{
    private $_id;
    private $_pseudo;
    private $_mail;
    private $_mdp;

    function __construct($ident)
    {
        $this->connexionBdd();
        if ($ident == null)
        {
        }
        else
        {
            $this->hydrate($this->getUnTuple($this->ident));
        }

    }

    public function hydrate(array $data)
    {
        $this->_pseudo = $data['pseudo'];
        $this->_mail = $data['mail'];
        $this->_mdp = $data['mdp'];
    }

    //SETTERS
    public function setId($id)
    {
        $id = (int) $id;
        if($id>0)
            $this->_id = $id;
    }

    public function setPseudo($pseudo)
    {
        if(is_string($pseudo))
            $this->_pseudo = $pseudo;
    }

    public function setMdp($mdp)
    {
        if(is_string($mdp))
            $this->_mdp = $mdp;
    }

    public function setMail($mail)
    {
        if(is_mail($mail))
            $this->_mail = $mail;
    }

    //GETTERS


    public function getId()
    {
        return $this->_id;
    }


    public function getMail()
    {
        return $this->_mail;
    }


    public function getPseudo()
    {
        return $this->_pseudo;
    }

    //Autres fonctions

    public function is_mail($mail)
    {
        $ismail = 0;
        if(is_string($mail))
        {
            $taille_str = strlen($mail);
            for($i = 0; $i<= $taille_str;++$i)
            {
                if($mail[i] == '@')
                {
                    $cmp = i;
                    $ismail = 1;
                }
                if($ismail) break;
            }
            if(!$ismail) return 0;
            $ismail = 0;
            for($i = $cmp; $i<= $taille_str;++$i)
            {
                if($mail[i] == '.' and $mail[i+1] != null)
                {
                    $ismail = 1;
                }
                if($ismail) break;
            }
        }
        else
            return 0;
        return $ismail;
    }
}
?>
