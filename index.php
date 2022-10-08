<?php

// define("URL", str_replace("index.php", "",(isset($_SERVER['HTTPS']) ? "https" : "http").
// "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

// try{
// if(empty($_GET['page'])){
//     http_response_code(404);
// }else{
//     $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));

//     echo "<pre>";
//     print_r($url);
//     echo "</pre>";
    
//     }
// }catch (Exception $e){
//     $msg = $e->getMessage();

//     header("HTTP/1.1 404 Not Found");
//     $outPut = array("message" =>$msg);
//     echo json_encode($outPut);

// }