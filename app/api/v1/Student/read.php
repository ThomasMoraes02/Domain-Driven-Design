<?php

use Alura\CleanArchitecture\src\Infra\Student\StudentRepositoryPdo;
use phpDocumentor\Reflection\Types\Object_;

require_once __DIR__ . "/../../api-config.php";

switch ($type_request) {
    case 'GET':
        try {
            $repository = new StudentRepositoryPdo();
            $all_students = $repository->getAll();

            foreach($all_students as $student_key => $student) {
                $students[] = [
                    "name" => $student->getName(),
                    "cpf" => $student->getCpf(),
                    "email" => $student->getEmail(),
                    "phones" => $student->phones()
                ];
            }

        } catch(Throwable $e) {
            $messageError = $e->getMessage();
        }

        if(!is_null($students)) {
            $json = json_encode(array("status" => true, "students" => $students), true);
        } else {
            $json = json_encode(array("status" => false, "message" => $messageError), true);
        }

        header('Content-Type: application/json');
        echo $json;
        break;
    
    default:
        header('HTTP/1.0 405 Method Not Allowed');
        break;
}