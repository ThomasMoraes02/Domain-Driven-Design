<?php 
namespace Alura\CleanArchitecture\test;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Alura\CleanArchitecture\src\Domain\Email;

class EmailTest extends TestCase
{
    public function test_email_invalid()
    {
        $this->expectException(InvalidArgumentException::class);
        new Email("E-mail invalid");
    }

    public function test_email_valid()
    {
        $email = new Email("tho.vini7@gmail.com");
        $this->assertEquals($email, "tho.vini7@gmail.com");
    }
}