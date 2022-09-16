<?php 
namespace Alura\CleanArchitecture\src\Domain\Student;

interface PasswordHash
{
    public function encrypt(string $password): string;

    public function verifyPassword(string $passwordText, string $passwordEncrypt): bool;
}