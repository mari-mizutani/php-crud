<?php
declare(strict_types = 1);

class StudentController
{
    //render function
    public function render(array $GET, array $POST)
    {


        //load the view
        require 'View/studentRegister.php';
    }
}