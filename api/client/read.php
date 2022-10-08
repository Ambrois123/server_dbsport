<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../Config/Database.php';
include_once '../../models//Client.php';

$database = new Database();
$db = $database->getConnection();

$client = new Client($db);

$result = $client->read();

$num = $result->rowCount();

if($num > 0) {
    $clients_arr = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $client_item=array(
           'client_id' => $client_id,
           'client_name' => $client_name,
           'client_adress' => $client_adress,
           'client_active' => $client_active,
           'client_phone' => $client_phone,
           'client_email' => $client_email,
           'client_dpo' => $client_dpo,
           'client_tech' => $client_tech,
           'client_com' => $client_com,
           'client_url' => $client_url,
           'client_logo' => $client_logo,
           'client_historic' => $client_historic,
           'client_prez' => $client_prez,
        );

        array_push($clients_arr, $client_item);
    }

    echo json_encode($clients_arr);
}else{
    echo json_encode((
        array('message' => 'No Clients Found')
    ));
}