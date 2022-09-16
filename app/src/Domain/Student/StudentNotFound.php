<?php 
namespace Alura\CleanArchitecture\src\Domain\Student;

use DomainException;
use Alura\CleanArchitecture\src\Domain\Cpf;

class StudentNotFound extends DomainException
{
    public function __construct(Cpf $cpf)
    {
        parent::__construct("Student with CPF $cpf not found.");
    }
}