<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, x-Request-With');

include_once '../../Config/Database.php';
include_once '../../models//Client.php';

//instiate db $ instatntitate client
$database = new Database();
$db = $database->getConnection();

$client = new Client($db);

//get raw client data
$data = json_decode(file_get_contents("php://input"));

//set id update
$client->id = $data->id;

//delete client

if($client->delete()){
    echo json_encode(
        array('message' => 'Client supprimé' )
    );
} else {
    echo json_encode(
        array('message' => 'Client Non Supprimé')
    );
}