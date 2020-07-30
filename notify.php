<?php


if (isset($_SERVER['HTTP_ORIGIN'])) {

    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");

    header('Access-Control-Allow-Credentials: true');

    header('Access-Control-Max-Age: 86400');    // cache for 1 day

}

// Access-Control headers are received during OPTIONS requests

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])) {

        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    }

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) {

        header("Access-Control-Allow-Headers:{$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    }

    exit(0);
}



$data = file_get_contents("php://input");


if (isset($data)) {

    $request = json_decode($data);



}


$para      = 'issadorado@gmail.com';
$titulo    = 'Webhook';
$mensaje   = $data;
$cabeceras = 'From: me@test.com';

mail($para, $titulo, $mensaje, $cabeceras);



echo json_encode('ok',JSON_UNESCAPED_UNICODE);


?>