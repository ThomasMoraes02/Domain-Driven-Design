<?php 
namespace Alura\CleanArchitecture\test\Domain\Student;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Alura\CleanArchitecture\src\Domain\Student\Phone;

class PhoneTest extends TestCase
{
    public function test_phone_is_valid()
    {
        $phone = new Phone("11", "972173967");
        $this->assertSame("(11) 972173967", (string) $phone);
    }

    public function test_phone_is_invalid()
    {
        $this->expectException(InvalidArgumentException::class);
        $phone = new Phone("ddd invalid", "972173967");
    }
}