<?php 
namespace Alura\CleanArchitecture\src\Domain\Student;

use Alura\CleanArchitecture\src\Domain\Cpf;
use Alura\CleanArchitecture\src\Domain\Email;
use Alura\CleanArchitecture\src\Domain\Student\Phone;

class Student
{
    private $cpf;
    private $name;
    private $email;
    private $phones = [];   
    private $password;
    
    public function __construct(Cpf $cpf, string $name, Email $email)
    {
        $this->cpf = $cpf;
        $this->name = $name;
        $this->email = $email;
        $this->phones = [];
    }

    public static function withCpfNameAndEmail(string $cpf, string $name, string $email): self
    {
        return new Student(new Cpf($cpf), $name, new Email($email));
    }

    public function addPhone(string $ddd, string $number): self
    {
        $this->phones[] = new Phone($ddd, $number);
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     *
     * @return Phone[]
     */
    public function phones(): array
    {
        return $this->phones;
    }
}