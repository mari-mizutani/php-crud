<?php
declare(strict_types=1);

//include all your model files here
require 'Model/database.php';


//include all your controllers here
require 'Controller/HomepageController.php';
require 'Controller/StudentController.php';
require 'Controller/TeacherController.php';
require 'Controller/ClassController.php';
require 'Controller/ListController.php';

//you could write a simple IF here based on some $_GET or $_POST vars, to choose your controller
//this file should never be more than 20 lines of code!

$controller = new HomepageController();
if(isset($_GET['page']) && $_GET['page'] === 'studentRegister') {
    $controller = new StudentController();
}

$controller2 = new HomepageController();
if(isset($_GET['page']) && $_GET['page'] === 'teacherRegister') {
    $controller = new TeacherController();
}

$controller3 = new HomepageController();
if(isset($_GET['page']) && $_GET['page'] === 'classRegister') {
    $controller = new ClassController();
}

$controller4 = new HomepageController();
if(isset($_GET['page']) && $_GET['page'] === 'list') {
    $controller = new ListController();
}


$controller->render($_GET, $_POST);