<?php 
namespace Alura\CleanArchitecture\test\Domain\Student;

use PHPUnit\Framework\TestCase;
use Alura\CleanArchitecture\src\Domain\Student\Student;

class StudentTest extends TestCase
{
    public function test_create_student()
    {
        $student = Student::withCpfNameAndEmail("123.456.789-10", "Thomas", "tho.vini7@gmail.com")->addPhone("11", "972173967");

        $this->assertEquals("Thomas", $student->getName());
        $this->assertEquals("123.456.789-10", $student->getCpf());
        $this->assertEquals("tho.vini7@gmail.com", $student->getEmail());
    }
}