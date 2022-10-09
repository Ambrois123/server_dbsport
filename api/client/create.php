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

    $client->client_name = $data->client_name;
    $client->client_adress = $data->client_adress;
    $client->client_active = $data->client_active;
    $client->client_phone = $data->client_phone;
    $client->client_email = $data->client_email;
    $client->client_dpo = $data->client_dpo;
    $client->client_tech = $data->client_tech;
    $client->client_com = $data->client_com;
    $client->client_url = $data->client_url;
    $client->client_logo = $data->client_logo;
    $client->client_historic = $data->client_historic;
    $client->client_prez = $data->client_prez;

//create client

if($client->create()){
    echo json_encode(
        array('message' => 'Client Created')
    );
} else {
    echo json_encode(
        array('message' => 'Client Not Created')
    );
}