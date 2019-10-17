<?php
class CDiscussion{
    private $discussion;

    function __construct($arg) {
        require_once ('model/MDiscussion.php');
        $this->discussion = new MDiscussion($arg[1]);
        //si la discussion n'existe pas
        if ($this->discussion->getStatut() == 'non_existant')
        {
            echo 'la discussion nexiste pas <br>';
        }
    }

    public function getDiscussion()
    {
        return $this->discussion;
    }
}
?>
