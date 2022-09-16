<?php 
namespace Alura\CleanArchitecture\src\Application\Student\StudentRegister;

class StudentRegisterDto
{
    public $cpf;
    public $name;
    public $email;

    public function __construct(string $cpf, string $name, string $email)
    {
        $this->cpf = $cpf;
        $this->name = $name;
        $this->email = $email;
    }
}