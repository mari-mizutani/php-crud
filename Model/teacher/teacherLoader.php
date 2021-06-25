<?php
declare(strict_types = 1);

class TeacherLoader
{
    private array $teachers;
    private $selectedTeacher;

    //loads teacher objects based on the query and collects them in an array
    public function getTeachers()
    {
        //opening connection to the database
        $pdo = Database::openConnection();
        //prepare->execute->fetch query
        $handle = $pdo->prepare('SELECT teacherId, teacherName, email FROM teacher');      
        $handle->execute();
        $teachers = $handle->fetchAll();
        //loop through the array of the results
        foreach ($teachers as $teacher) {
            //create objects with the specific data, and push them to the array of $teachers
            $newTeacher = new Teacher(intval($teacher['teacherId']),$teacher['teacherName'],$teacher['email']);
            $this->teachers []= $newTeacher;
        }

    }
    // function that searches for the $_POST['teacherName']id in the array, then returns the right object
    public function findTeacherById(int $teacherId){
        foreach($this->teachers as $teacher) {
            if ($teacherId == $teacher->getId()) {
                $this->selectedTeacher = $teacher;
                return $teacher;
            }
        }
    }

    


    public function getTeacherArr()
    {
        return $this->teachers;
    }

}