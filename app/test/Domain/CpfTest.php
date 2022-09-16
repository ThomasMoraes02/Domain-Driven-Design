<?php 
namespace Alura\CleanArchitecture\test;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Alura\CleanArchitecture\src\Domain\Cpf;

class CpfTest extends TestCase
{
    public function test_cpf_is_valid()
    {
        $cpf = new Cpf("123.456.789-10");
        $this->assertEquals("123.456.789-10", $cpf);
    }

    public function test_cpf_is_invalid()
    {
        $this->expectException(InvalidArgumentException::class);
        new Cpf("12345678910");
    }
}