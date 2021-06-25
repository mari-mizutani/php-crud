<?php

//setting class for getting info from student, studentLoader generates objects
class Student {
    private int $studentId;
    private string $studentName;
    private string $studentEmail;
    private string $teacherName;
    private string $className;


    public function __construct(int $studentId, string $studentName, string $studentEmail,string $teacherName,string $className)
    {
        $this->studentId= $studentId;
        $this->studentName= $studentName;
        $this->studentEmail= $studentEmail;
        $this->teacherName= $teacherName;
        $this->className= $className;
    }

    public function getId(): int
    {
        return $this->studentId;
    }

    public function getName(): string
    {
        return $this->studentName;
    }

    public function getEmail(): string
    {
        return $this->studentEmail;
    }

    public function getTeacherName(): string
    {
        return $this->teacherName;
    }

    public function getClassName(): string
    {
        return $this->className;
    }

}