<?php
declare(strict_types = 1);

class TeacherController
{
    //render function
    public function render()
    {
        //make new teacher objects from TeacherLoader
        $teachers= new Teacherloader();
        $teachers->getTeachers();
        
        //default values for view
        $id="";
        $name = "";
        $email="";
        $studentName="";

        //when form submitted, get each value
        if ( !empty($_POST['teacherName']) && !empty($_POST['email']) && !empty($_POST['studentName']) ) {

            //assigning values from posts
            $teacherId= intval($_POST['id']);
            $teacherName =$_POST['teacherName'];
            $email =$_POST['email'];
            $studentName =$_POST['studentName'];

            //find objects from each array
            $studentObj= $students->findStudentById($studentId);
                        
            //set view variables 
            $name = $teacherObj->getName();
            $teacherName= $teacherObj->getName();
            $className = $classObj->getName();
        }

        //load the view
        require 'View/teacherRegister.php';
    }
}