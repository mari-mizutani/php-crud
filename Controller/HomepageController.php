<?php
declare(strict_types = 1);

class HomepageController
{
    //render function
    public function render()
    {
        //load the view
        require 'View/homepage.php';
    }
}