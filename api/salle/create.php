<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, x-Request-With');

include_once '../../Config/Database.php';
include_once '../../models//salle.php';

//instiate db $ instatntitate client
$database = new Database();
$db = $database->getConnection();

$salle = new Salle($db);

//get raw salle data
$data = json_decode(file_get_contents("php://input"));

    $salle->salle_name = $data->salle_name;
    $salle->salle_adress = $data->salle_adress;

//create csalle

if($salle->create()){
    echo json_encode(
        array('message' => 'Salle Created')
    );
} else {
    echo json_encode(
        array('message' => 'Salle Not Created')
    );
}