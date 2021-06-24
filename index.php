<?php
declare(strict_types=1);

//include all your model files here
require 'Model/database.php';
require 'Model/student.php';
require 'Model/studentLoader.php';
require 'Model/teacher.php';
require 'Model/teacherLoader.php';
require 'Model/class.php';
require 'Model/classLoader.php';
//include all your controllers here
require 'Controller/HomepageController.php';
require 'Controller/StudentController.php';
require 'Controller/TeacherController.php';
require 'Controller/ClassController.php';

$controller = new HomepageController();
if(isset($_GET['page']) && $_GET['page'] === 'studentRegister') {
    $controller = new StudentController();
}else if(isset($_GET['page']) && $_GET['page'] === 'teacherRegister') {
    $controller = new TeacherController();
}else if(isset($_GET['page']) && $_GET['page'] === 'classRegister') {
    $controller = new ClassController();
}

$controller->render();