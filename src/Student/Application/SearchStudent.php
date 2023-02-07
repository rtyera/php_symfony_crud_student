<?php

namespace App\Student\Application;

use App\Student\Domain\Student;
use App\Student\Domain\StudentRepository;
use App\Student\Domain\ValueObject\StudentId;

final class SearchStudent{

    public function __construct(private StudentRepository $studentRepository){}

    public function __invoke(string $studentId){
        return $this->studentRepository->search($studentId);
    }

}