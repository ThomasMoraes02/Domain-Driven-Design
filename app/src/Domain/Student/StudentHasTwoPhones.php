<?php 
namespace Alura\CleanArchitecture\src\Domain\Student;

use DomainException;

class StudentHasTwoPhones extends DomainException
{
    public function __construct()
    {
        parent::__construct("Student already has two phones.");
    }
}