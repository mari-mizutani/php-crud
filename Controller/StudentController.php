<?php
declare(strict_types = 1);

class StudentController
{
    //render function
    public function render()
    {
        //make new student objects from StudentLoader
        $students= new Studentloader();
        $students->getStudents();

        //make new teacher objects from TeacherLoader
        $teachers= new Teacherloader();
        $teachers->getTeachers();

        //make new class objects from ClassLoader
        $classes= new Classloader();
        $classes->getClasses();
        
        //default values for view
        $studentName = "";
        $studentEmail="";
        $className="";
        $teacherName="";

        //when form submitted, get each value
        if ( !empty($_POST['studentName']) && !empty($_POST['studentEmail']) && !empty($_POST['className']) && !empty($_POST['teacherName']) ) {

            //assigning values from posts
            $studentName =$_POST['studentName'];
            $studentEmail =$_POST['studentEmail'];
            $className =$_POST['className'];
            $teacherName =$_POST['teacherName'];

            //find objects from each array
            $teacherObj= $teachers->findTeacherById($teacherId);
            $classObj = $classes->findClassById($classId);
                        
            //set view variables
            $studentName = $studentObj->getName();
            $studentEmail = $studentObj->getEmail();
            $teacherName= $teacherObj->getName();
            $className = $classObj->getName();
        }

        //load the view
        require 'View/studentRegister.php';
    }
}