<?php
class CDiscussion{
    private $discussion;

    function __construct($arg) {
        require_once ('model/MDiscussion.php');
        $this->discussion = new MDiscussion($arg[1]);
    }
}
?>
