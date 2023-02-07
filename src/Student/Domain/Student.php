<?php

namespace App\Student\Domain;

use App\Student\Domain\ValueObject\Mail;
use App\Student\Domain\ValueObject\Name;
use App\Student\Domain\ValueObject\StudentId;

final class Student
{
    public function __construct(private StudentId $id, private Name $name, private Mail $mail)
    {
        $this->id = $id;
        $this->name = $name;
        $this->mail = $mail;
    }

    public static function create(StudentId $id, Name $name, Mail $mail)
    {
        $student = new self($id, $name, $mail);

        return $student;
    }

    public function id(): StudentId
    {
        return $this->id;
    }

    public function name(): Name 
    {
        return $this->name;
    }

    public function mail(): Mail
    {
        return $this->mail;
    }
    
}
