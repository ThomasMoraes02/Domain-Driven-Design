<?php 
namespace Alura\CleanArchitecture\src\Domain;

use InvalidArgumentException;

class Cpf
{
    private $cpf;

    public function __construct(string $cpf)
    {
        $this->setCpf($cpf);
    }

    private function setCpf(string $cpf): void
    {
        $options = [
            'options' => [
                'regexp' => '/\d{3}\.\d{3}\.\d{3}\-\d{2}/'
            ]
        ];

        if(filter_var($cpf, FILTER_VALIDATE_REGEXP, $options) === false) {
            throw new InvalidArgumentException("Cpf is invalid");
        }

        $this->cpf = $cpf;
    }

    public function __toString(): string
    {
        return $this->cpf;
    }
}