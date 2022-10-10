<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

include_once '../../Config/Database.php';
include_once '../../models/salle.php';

//instiate db $ instatntitate client
$database = new Database();
$db = $database->getConnection();

$salle = new Salle($db);


// call read function
$result = $salle->read();

$num = $result->rowCount();

if($num > 0) {
    $salles_arr = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){

        //transform bool in true or false
        $row['salle_active'] = (bool) $row['salle_active'];
        extract($row);

        $salle_item = array(
           'salle_id' => $id,
           'salle_name' => $salle_name,
           'salle_address' => $salle_address,
           'salle_active' => $salle_active,
           'client_name' => $client_name,
           'client_dpo' => $client_dpo,
           'client_tech' => $client_tech,
           'branch_id' => $branch_id,
           'branch_name' => $branch_name,
           'zone_id' => $zones_id,
           'zone_name' => $zone_name,
        );

        array_push($salles_arr, $salle_item);
    }
        //json format
    echo json_encode($salles_arr);
}else{
    echo json_encode((
        array('message' => 'Salle Non Trouvé')
    ));
}

