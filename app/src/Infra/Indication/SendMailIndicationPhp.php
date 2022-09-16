<?php 
namespace Alura\CleanArchitecture\src\Infra\Indication;

use Alura\CleanArchitecture\src\Application\Indication\SendMailIndication;
use Alura\CleanArchitecture\src\Domain\Student\Student;

class SendMailIndicationPhp implements SendMailIndication
{
    public function send(Student $student): void
    {
        $to = $student->getEmail();

        $subject = "Welcome {$student->getName()} !!!";
        $message = 'Welcome to School';

        $headers = [
            'From' => 'alura@gmail.com',
            'Replay-To' => 'aluraStudentds@gmail.com',
            'X-Mailer' => 'PHP/' . phpversion()
        ];

        mail($to, $subject, $message, $headers);
    }
}