<?php

namespace App\Student\Application;

use App\Student\Domain\StudentRepository;

final class ListStudents{

    public function __construct(private StudentRepository $studentRepository){
        $this->studentRepository = $studentRepository;
    }

    public function __invoke(): array{
        return $this->studentRepository->list();
    }
}