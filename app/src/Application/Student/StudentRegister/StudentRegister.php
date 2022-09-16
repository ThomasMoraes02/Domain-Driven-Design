<?php 
namespace Alura\CleanArchitecture\src\Application\Student\StudentRegister;

use Alura\CleanArchitecture\src\Domain\Student\Student;
use Alura\CleanArchitecture\src\Domain\Student\StudentRepository;
use Alura\CleanArchitecture\src\Application\Student\StudentRegister\StudentRegisterDto;

class StudentRegister
{
    private $studentRepository;

    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function execute(StudentRegisterDto $studentDto): void
    {
        $student = Student::withCpfNameAndEmail($studentDto->cpf, $studentDto->name, $studentDto->email);
        $this->studentRepository->addStudent($student);
    }
}