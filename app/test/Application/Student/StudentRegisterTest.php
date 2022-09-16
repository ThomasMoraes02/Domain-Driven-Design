<?php 
namespace Alura\CleanArchitecture\test\Application\Student;

use Alura\CleanArchitecture\src\Application\Student\StudentRegister\StudentRegister;
use Alura\CleanArchitecture\src\Application\Student\StudentRegister\StudentRegisterDto;
use Alura\CleanArchitecture\src\Domain\Cpf;
use Alura\CleanArchitecture\src\Infra\Student\StudentRepositoryMemory;
use Alura\CleanArchitecture\src\Infra\Student\StudentRepositoryPdo;
use Alura\CleanArchitecture\src\Infra\Student\StudentRepositorySqlite;
use PHPUnit\Framework\TestCase;

class StudentRegisterTest extends TestCase
{
    public function test_student_add_repository()
    {
        $studentRegister = new StudentRegisterDto("321.456.789-35", "Joice", "joice@gmail.com");

        $repository = new StudentRepositorySqlite();

        $useCase = new StudentRegister($repository);
        $useCase->execute($studentRegister);

        $student = $repository->getStudentWithCpf(new Cpf("321.456.789-35"));

        $this->assertSame("Joice", (string) $student->getName());
        $this->assertSame("joice@gmail.com", (string) $student->getEmail());
        $this->assertEmpty($student->phones());
    }
}