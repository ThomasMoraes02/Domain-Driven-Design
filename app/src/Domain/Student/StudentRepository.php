<?php 
namespace Alura\CleanArchitecture\src\Domain\Student;

use Alura\CleanArchitecture\src\Domain\Cpf;
use Alura\CleanArchitecture\src\Domain\Student\Student;

interface StudentRepository
{
    public function addStudent(Student $student): void;

    public function getStudentWithCpf(Cpf $cpf): Student;

    /**
     * @return Student[]
     */
    public function getAll(): array;
}