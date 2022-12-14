<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

include_once '../../Config/Database.php';
include_once '../../models//Client.php';

//instiate db $ instatntitate client
$database = new Database();
$db = $database->getConnection();

$client = new Client($db);

// call read function
$result = $client->read();

$num = $result->rowCount();

if($num > 0) {
    $clients_arr = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){

        //transform bool in true or false
        $row['client_active'] = (bool) $row['client_active'];
        extract($row);

        $client_item = array(
           'id' => $id,
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
        //json format
    echo json_encode($clients_arr);
}else{
    echo json_encode((
        array('message' => 'No Clients Found')
    ));
}