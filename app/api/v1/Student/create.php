<?php

use Throwable;
use Alura\CleanArchitecture\src\Domain\Cpf;
use Alura\CleanArchitecture\src\Infra\Student\StudentRepositoryMemory;
use Alura\CleanArchitecture\src\Application\Student\StudentRegister\StudentRegister;
use Alura\CleanArchitecture\src\Application\Student\StudentRegister\StudentRegisterDto;
use Alura\CleanArchitecture\src\Infra\Student\StudentRepositoryPdo;

require_once __DIR__ . "/../../api-config.php";

switch ($type_request) {
    case 'POST':
        try {
            $studentRegister = new StudentRegisterDto($cpf, $name, $email);
            $repository = new StudentRepositoryPdo();

            $useCase = new StudentRegister($repository);
            $useCase->execute($studentRegister);
    
            $student = $repository->getStudentWithCpf(new Cpf($cpf));

        } catch(Throwable $e) {
            $messageError = $e->getMessage();
        }

        if(!is_null($student)) {
            $json = json_encode(array("status" => TRUE, "message" => "Student created Successfully", "name" => $student->getName()), true);
        } else {
            $json = json_encode(array("status" => FALSE, "message" => "Student creation Failed: " . $messageError), true);
        }

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
        echo $json; 
        break;
    
    default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}