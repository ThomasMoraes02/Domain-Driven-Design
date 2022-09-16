<?php

use Alura\CleanArchitecture\src\Domain\Cpf;
use Alura\CleanArchitecture\src\Infra\Student\StudentRepositoryMemory;
use Alura\CleanArchitecture\src\Application\Student\StudentRegister\StudentRegister;
use Alura\CleanArchitecture\src\Application\Student\StudentRegister\StudentRegisterDto;

require_once("vendor/autoload.php");

$studentRegister = new StudentRegisterDto("123.456.789-10", "Thomas", "thomas@gmail.com");

$repository = new StudentRepositoryMemory();

$useCase = new StudentRegister($repository);
$useCase->execute($studentRegister);

// $student = $repository->getStudentWithCpf(new Cpf("123.456.789-10"));

print_r($repository->getAll());
