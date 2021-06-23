<?php

//setting class for getting id,name and location from class, classLoader generates objects
class SchoolClass {
    private int $classId;
    private string $className;
    private string $location;


    public function __construct(int $classId, string $className, string $location)
    {
        $this->classId= $classId;
        $this->className= $className;
        $this->location= $location;
    }

    public function getId(): int
    {
        return $this->classId;
    }

    public function getName(): string
    {
        return $this->className;
    }

    public function getLocation(): int
    {
        return $this->location;
    }



}