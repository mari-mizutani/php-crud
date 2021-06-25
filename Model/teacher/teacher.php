<?php

//Create new records with an HTML form and send data to the server with a POST request.

class Teacher{
    private int $teacherId;
    private string $teacherName;
    private string $teacherEmail;

    public function __construct(int $teacherId, string $teacherName, string $teacherEmail){
        $this->teacherId=$teacherId;
        $this->teacherName=$teacherName;
        $this->teacherEmail=$teacherEmail;
    }

    public function getId(): int{
        return $this->teacherId;
    }

    public function getName(): string{
        return $this->teacherName;
    }

    public function getEmail(): string{
        return $this->teacherEmail;
    }


}