<?php 
namespace Alura\CleanArchitecture\src\Indicate;

use DateTimeImmutable;
use Alura\CleanArchitecture\src\Student\Student;

class StudentIndicated
{
    private $indicate;
    private $indicated;
    private $dateIndicate;

    public function __construct(Student $indicate, Student $indicated)
    {
        $this->indicate = $indicate;
        $this->indicated = $indicated;
        $this->dateIndicate = new DateTimeImmutable();
    }
}