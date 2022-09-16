<?php 

require_once __DIR__ . "/../../vendor/autoload.php";

$type_request = $_SERVER['REQUEST_METHOD'];

extract($_POST);

$get = $_GET;