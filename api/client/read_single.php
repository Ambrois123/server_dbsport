<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

include_once '../../Config/Database.php';
include_once '../../models//Client.php';

$database = new Database();
$db = $database->getConnection();

$client = new Client($db);

//get id
$client->id = isset($_GET['id']) ? $_GET['id'] : die();

//get client
$client->read_single();

//create array
    $client_arr = array(
            'id' => $client->id,
           'client_name' => $client->client_name,
           'client_adress' => $client->client_adress,
           'client_active' => $client->client_active,
           'client_phone' => $client->client_phone,
           'client_email' => $client->client_email,
           'client_dpo' => $client->client_dpo,
           'client_tech' => $client->client_tech,
           'client_com' => $client->client_com,
           'client_url' => $client->client_url,
           'client_logo' => $client->client_logo,
           'client_historic' => $client->client_historic,
           'client_prez' => $client->client_prez,
    );

    //Make JSON
    print_r(json_encode($client_arr));
