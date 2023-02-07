<?php

namespace App\Student\Application;

use App\Student\Domain\StudentRepository;
use App\Student\Domain\ValueObject\StudentId;

final class DeleteStudent{

    public function __construct(private StudentRepository $studentRepository){} 

    public function __invoke(string $studentId): void{
        $this->studentRepository->delete(new StudentId($studentId));
    }
}