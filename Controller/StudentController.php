<?php
declare(strict_types = 1);

class StudentController
{
    //render function
    public function render()
    {
        //make new student objects from StudentLoader
        $students= new StudentLoader();
        $students->getStudents();

        //make new teacher objects from TeacherLoader
        $teachers= new TeacherLoader();
        $teachers->getTeachers();

        //make new class objects from ClassLoader
        $classes= new ClassLoader();
        $classes->getClasses();
        
        //default values for view
        $studentName = "";
        $studentEmail="";
        $className="";
        $teacherName="";

        //when form submitted, get each value
        if ( !empty($_POST['studentName']) && !empty($_POST['studentEmail']) && !empty($_POST['className']) && !empty($_POST['teacherName']) ) {
            // if(isset($_POST['register'] )){
            //assigning values from posts
            $studentName =$_POST['studentName'];
            $studentEmail =$_POST['studentEmail'];
            $classId =intval($_POST['className']);
            $teacherId =intval($_POST['teacherName']);

            $pdo = Database::openConnection();

            $statement = $pdo->prepare("INSERT INTO student(studentName,email,classId,teacherId) VALUES (:studentName,:email,:classId,:teacherId)");
            $statement->bindValue(':studentName',$studentName);
            $statement->bindValue(':email',$studentEmail);
            $statement->bindValue(':classId',$classId);
            $statement->bindValue(':teacherId',$teacherId);
            $statement->execute();

            //find objects from each array
            $classObj = $classes->findClassById($classId);
            $teacherObj= $teachers->findTeacherById($teacherId);
                        
            //set view variables
            $classId = $classObj->getName();
            $teacherId= $teacherObj->getName();

        }
        $students_arr = $students->getStudentArr();

        //load the view
        require 'View/studentRegister.php';
    }
}