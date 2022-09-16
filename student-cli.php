<?php

use Alura\CleanArchitecture\src\Domain\Student\Student;
use Alura\CleanArchitecture\src\Infra\Student\StudentRepositoryMemory;

require_once("vendor/autoload.php");

$cpf = $argv[1];
$email = $argv[2];
$name = $argv[3];
$ddd = $argv[4];
$number = $argv[5];

try {
    $student = Student::withCpfNameAndEmail($cpf, $name, $email)->addPhone($ddd, $number);

    $studentRepository = new StudentRepositoryMemory();
    $studentRepository->addStudent($student);

    $allStudents = $studentRepository->getAll();
    print_r($allStudents);
    
} catch(Throwable $e) {
    echo "Found error:" . PHP_EOL;
    echo $e->getMessage() . PHP_EOL;
}

// Open the terminal
// php student-cli.php "123.456.789-10" "test@gmail.com" "thomas" "11" "972173967"