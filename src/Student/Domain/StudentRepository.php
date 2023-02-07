<?php

namespace App\Student\Domain;

use App\Student\Domain\ValueObject\StudentId;

interface StudentRepository{

    public function create(Student  $student);

    public function search(string $id);

    public function list();

    public function delete(StudentId $id);
}