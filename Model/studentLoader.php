<?php
declare(strict_types = 1);

class Studentloader
{
    private array $students;
    private $selectedStudent;

    //loads student objects based on the query and collects them in an array
    public function getStudents()
    {
        //opening connection to the database
        $pdo = Database::openConnection();
        //prepare->execute->fetch query
        $handle = $pdo->prepare('SELECT studentId, studentName, email FROM student');      
        $handle->execute();
        $students = $handle->fetchAll();
        //loop through the array of the results
        foreach ($students as $student) {
            //create objects with the specific data, and push them to the array of $students
            $newStudent = new Student(intval($student['studentId']),$student['studentName'],$student['email']);
            $this->students []= $newStudent;
        }

    }
    // function that searches for the $_POST['studentName']id in the array, then returns the right object
    public function findStudentById(int $id){
        foreach($this->students as $student) {
            if ($id == $student->getId()) {
                $this->selectedStudent = $student;
                return $student;
            }
        }
    }


    public function getStudentArr()
    {
        return $this->students;
    }

}