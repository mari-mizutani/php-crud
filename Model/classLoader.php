<?php
declare(strict_types = 1);

class Classloader
{
    private array $classes;
    private $selectedClass;

    //loads class objects based on the query and collects them in an array
    public function getClasses()
    {
        //opening connection to the database
        $pdo = Database::openConnection();
        //prepare->execute->fetch query
        $handle = $pdo->prepare('SELECT classId, className,location FROM class');      
        $handle->execute();
        $classes = $handle->fetchAll();
        //loop through the array of the results
        foreach ($classes as $class) {
            //create objects with the specific data, and push them to the array of $classes
            $newClass = new SchoolClass(intval($class['classId']),$class['className'],$class['location']);
            $this->classes []= $newClass;
        }

    }
    // function that searches for the $_POST['className']id in the array, then returns the right object
    public function findClassById(int $id){
        foreach($this->classes as $class) {
            if ($id == $class->getId()) {
                $this->selectedClass = $class;
                return $class;
            }
        }
    }


    public function getClassArr()
    {
        return $this->classes;
    }

}