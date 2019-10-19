<?php
class CDiscussion{
    private $discussion;

    function __construct($arg) {
        require_once ('model/MDiscussion.php');
        try
        {
            if (isset($arg[1]))
            {
                $this->discussion = new MDiscussion($arg[1]);
            }
            else
            {
                throw new Exception('Aucune discussion selectionnée.');
            }
        }
        catch (Exception $e)
        {
            die('Erreur  : ' . $e->getMessage());
        }
        //si la discussion n'existe pas
//        if ($this->discussion->getStatut() == 'non_existant')
//        {
//            echo 'la discussion nexiste pas <br>';
//        }
    }

    public function getDiscussion()
    {
        return $this->discussion;
    }

    public function setDiscussion($discussion)
    {
        $this->discussion = $discussion;
    }
}
?>
