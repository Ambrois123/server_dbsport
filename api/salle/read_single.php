<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

include_once '../../Config/Database.php';
include_once '../../models/salle.php';

//instiate db $ instatntitate client
$database = new Database();
$db = $database->getConnection();

//intatiate
$salle = new Salle($db);

//get id
$salle->id = isset($_GET['id']) ? $_GET['id'] : die();

//get single salle
$salle->read_single();

//create array
$salle_arr = array(
    'salleId' => $salle ->id,
    'salle_name' => $salle ->salle_name,
    'salle_address' => $salle ->salle_address,
    'salle_active' => $salle ->salle_active,
    'client_name' => $salle ->client_name,
    'client_dpo' => $salle ->client_dpo,
    'client_tech' => $salle ->client_tech,
    'branch_id' => $salle ->branch_id,
    'branch_name' => $salle ->branch_name,
    'zone_id' => $salle ->zones_id,
    'zone_name' => $salle ->zone_name
);

   //Make JSON
    print_r(json_encode($salle_arr));

