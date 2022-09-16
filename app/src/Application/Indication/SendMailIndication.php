<?php 
namespace Alura\CleanArchitecture\src\Application\Indication;

use Alura\CleanArchitecture\src\Domain\Student\Student;

interface SendMailIndication
{
    public function send(Student $student): void;
}