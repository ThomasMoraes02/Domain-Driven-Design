<?php 
namespace Alura\CleanArchitecture\src\Domain;

use InvalidArgumentException;

class Email
{
    private $email;

    public function __construct(string $email)
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new InvalidArgumentException("E-mail invalid");
        }
        $this->email = $email;
    }

    public function __toString(): string
    {
        return $this->email;
    }
}