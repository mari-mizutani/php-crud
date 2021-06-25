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
        $studentName = $studentEmail = $className = $teacherName = "";
        $pdo = Database::openConnection();

        //when form submitted, get each value
        if ( isset($_POST['register']) ) {
            if( !empty($_POST['studentName']) && !empty($_POST['studentEmail']) && !empty($_POST['className']) && !empty($_POST['teacherName']) ) {
            //assigning values from posts
                $studentName =$_POST['studentName'];
                $studentEmail =$_POST['studentEmail'];
                $classId =intval($_POST['className']);
                $teacherId =intval($_POST['teacherName']);           

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
        }    
        $students_arr = $students->getStudentArr();

        //update button default
        $studentId="";
        $update=false;
        //for edit button
        if (isset($_POST['edit'])){
            $studentId = $_POST['edit'];
            //update button
            $update =true;
            //select student
            $statement = $pdo->prepare("SELECT*FROM student WHERE studentId=:studentId");        
            $statement->bindValue(':studentId',$studentId);
            $statement->execute();
            //fill in the select info in the form
            $student_info=$statement->fetch(PDO::FETCH_ASSOC);
            $studentId=$student_info['studentId'];
            $studentName=$student_info['studentName'];
            $studentEmail=$student_info['email'];
            $teacherName=$student_info['teacherId'];
            $className=$student_info['classId'];
        }

        //update button function
        if(isset($_POST['update'])){
            if( !empty($_POST['studentName']) && !empty($_POST['studentEmail']) ) {
                $studentId =intval($_POST['studentId']);
                $studentName= $_POST['studentName'];
                $studentEmail= $_POST['studentEmail'];
                $classId =intval($_POST['className']);
                $teacherId =intval($_POST['teacherName']); 

                $statement=$pdo->prepare("UPDATE student SET studentName=:studentName, email=:studentEmail, teacherId=:teacherId, classId=:classId WHERE studentId=:studentId");   
                $statement->bindValue(':studentId',$studentId);
                $statement->bindValue(':studentName',$studentName);
                $statement->bindValue(':email',$studentEmail);
                $statement->bindValue(':classId',$classId);
                $statement->bindValue(':teacherId',$teacherId);
                $statement->execute();
            }
        }



        //for delete button
        if (isset($_POST['delete'])){
            $studentId = $_POST['delete'];
            $statement = $pdo->prepare("DELETE FROM student WHERE studentId=:studentId");
            $statement->bindValue(':studentId',$studentId);
            $statement->execute();
        }

        //load the view
        require 'View/studentRegister.php';
    }
}