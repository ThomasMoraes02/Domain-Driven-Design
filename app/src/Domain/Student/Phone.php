<?php 
namespace Alura\CleanArchitecture\src\Domain\Student;

use InvalidArgumentException;

class Phone
{
    private $ddd;
    private $number;

    public function __construct(string $ddd, string $number)
    {
        $this->setDdd($ddd);
        $this->setNumber($number);
    }

    private function setDdd(string $ddd): void
    {
        if(preg_match('/\d{2}/', $ddd) !== 1) {
            throw new InvalidArgumentException('DDD Invalid');
        }
        $this->ddd = $ddd;
    }

    private function setNumber(string $number): void
    {
        if(preg_match('/\d{8,9}/', $number) !== 1) {
            throw new InvalidArgumentException('Number is invalid');
        }
        $this->number = $number;
    }

    public function __toString(): string
    {
        return "({$this->ddd}) {$this->number}";
    }

    public function getDdd()
    {
        return $this->ddd;
    }

    public function getNumber()
    {
        return $this->number;
    }
}