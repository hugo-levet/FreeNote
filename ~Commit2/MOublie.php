<?php
require_once ('model/MModel.php');
class MOublie extends MModel
{
    private $type;
    private $mail;

    function __construct($mail)
    {
        $this->table = 'utilisateur';
        $this->connexionBdd();
        try
        {
            $request = "SELECT id FROM '$this->table' WHERE mail == '$mail'";
        }
        catch (Exception $e)
        {
            echo 'Exception : ' . $e->getMessage();
        }
        $this->id == $request;
    }

    public function Change()
    {
        if ($this->type == 'mdp')
        {
            $nouvmdp = mt_rand(1000000, 9999999);
            $nouvmdp = md5($nouvmdp);
            $this->changementBDD($nouvmdp, 'mdp');
            //envoyer mail
        }
        elseif ($this->type == 'pseudo')
        {
            $requete = "SELECT Pseudo FROM '$this->table' WHERE id == '$this->id'";
            //envoyer mail
        }
    }
}

//mail to: profil@alwaysdata.net

?>

