<?php
declare(strict_types = 1);

class ClassController
{
    //render function
    public function render()
    {
        //make new class objects from ClassLoader
        $classes= new Classloader();
        $classes->getClasses();
        
        //default values for view
        $id="";
        $name = "";
        $location = "";
        $teacherName="";
        $studentName="";

        //when form submitted, get each value
        if ( !empty($_POST['className']) && !empty($_POST['location'])  && !empty($_POST['teacherName']) && !empty($_POST['studentName']) ) {

            //assigning values from posts
            $classId= intval($_POST['id']);
            $className =$_POST['className'];
            $location= intval($_POST['location']);
            $teacherName =$_POST['teacherName'];
            $studentName =$_POST['studentName'];

            //find objects from each array
            $classObj= $classes->findClassById($classId);
            $teacherObj= $teachers->findTeacherById($teacherId);
            $studentObj = $studentes->findStudentById($studentId);
                        
            //set view variables 
            $name = $classObj->getName();
            $teacherName= $teacherObj->getName();
            $studentName = $studentObj->getName();
        }

        //load the view
        require 'View/classRegister.php';
    }
}