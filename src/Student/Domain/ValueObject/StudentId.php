<?php

namespace App\Student\Domain\ValueObject;

use App\Shared\ValueObject\Uuid;

class StudentId extends Uuid{

    public function __construct(string $value){
        parent::__construct($value);
    }
}