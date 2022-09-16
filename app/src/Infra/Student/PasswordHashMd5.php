<?php 
namespace Alura\CleanArchitecture\src\Infra\Student;

use Alura\CleanArchitecture\src\Domain\Student\PasswordHash;

class PasswordHashMd5 implements PasswordHash
{
    public function encrypt(string $password): string
    {
        return md5($password);
    }

    public function verifyPassword(string $passwordText, string $passwordEncrypt): bool
    {
        return md5($passwordText) === $passwordEncrypt;
    }
}