<?php

namespace App\Student\Application;

use App\Student\Domain\Student;
use App\Student\Domain\StudentRepository;
use App\Student\Domain\ValueObject\Mail;
use App\Student\Domain\ValueObject\Name;
use App\Student\Domain\ValueObject\StudentId;

final class CreateStudent{

    public function __construct(private StudentRepository $studentRepository){}

    public function __invoke(string $name, string $mail): void
    {
        $student = new Student(StudentId::random(), new Name($name), new Mail($mail));
        $this->studentRepository->create($student);
    }
    
}