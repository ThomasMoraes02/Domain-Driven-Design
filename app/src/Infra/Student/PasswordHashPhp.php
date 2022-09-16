<?php
namespace Alura\CleanArchitecture\src\Infra\Student;

use Alura\CleanArchitecture\src\Domain\Student\PasswordHash;

class PasswordHashPhp implements PasswordHash
{
    public function encrypt(string $password): string
    {
        return password_hash($password, PASSWORD_ARGON2ID);
    }

    public function verifyPassword(string $passwordText, string $passwordEncrypt): bool
    {
        return password_verify($passwordText, $passwordEncrypt);
    }
}