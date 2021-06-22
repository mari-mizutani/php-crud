<?php
declare(strict_types = 1);

class ListController
{
    //render function
    public function render(array $GET, array $POST)
    {


        //load the view
        require 'View/list.php';
    }
}