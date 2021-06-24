<?php
declare(strict_types = 1);

class StudentLoader
{
    private array $students;
    private $selectedStudent;

    //loads student objects based on the query and collects them in an array
    public function getStudents()
    {
        //opening connection to the database
        $pdo = Database::openConnection();
        //prepare->execute->fetch query
        $handle = $pdo->prepare('SELECT student.studentId,student.studentName,student.email,teacher.teacherName ,class.className FROM student 
                                LEFT JOIN teacher ON student.teacherId = teacher.teacherId
                                LEFT JOIN class ON student.classId = class.classId');      
        $handle->execute();
        $students = $handle->fetchAll();
        //loop through the array of the results
        foreach ($students as $student) {
            //create objects with the specific data, and push them to the array of $students
            $newStudent = new Student(intval($student['studentId']),$student['studentName'],$student['email'],$student['teacherName'],$student['className']);
            $this->students []= $newStudent;
        }

    }
    // function that searches for the $_POST['studentName']id in the array, then returns the right object
    public function findStudentById(int $studentId){
        foreach($this->students as $student) {
            if ($studentId == $student->getId()) {
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