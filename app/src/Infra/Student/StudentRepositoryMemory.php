<?php 
namespace Alura\CleanArchitecture\src\Infra\Student;

use Exception;
use Alura\CleanArchitecture\src\Domain\Cpf;
use Alura\CleanArchitecture\src\Domain\Student\Student;
use Alura\CleanArchitecture\src\Domain\Student\StudentNotFound;
use Alura\CleanArchitecture\src\Domain\Student\StudentRepository;

class StudentRepositoryMemory implements StudentRepository
{
    private $students = [];

    public function addStudent(Student $student): void
    {
        $this->students[] = $student;
    }

    public function getStudentWithCpf(Cpf $cpf): Student
    {
        $studentFilter = array_filter($this->students, function(Student $student) use ($cpf) {
            if($student->getCpf() == $cpf) {
                return $student;
            }
        });

        if(count($studentFilter) === 0) {
            throw new StudentNotFound($cpf);
        }

        if(count($studentFilter) > 1) {
            throw new Exception("Many students found with the same Cpf");
        }

        return $studentFilter[0];
    }

    public function getAll(): array
    {
        return $this->students;
    }
}