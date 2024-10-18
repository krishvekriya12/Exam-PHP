<?php

header("Access-Control-Allow-Method: GET");
header("Content-Type: application/json");

include "../config/config.php";

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $res = $config->fetchallrailwayticketbooking();
    $all_records = [];
    while($result = mysqli_fetch_assoc($res)){
        array_push($all_records,$result);
    }
    $arr['data'] = $all_records;
}else{
    $arr['err'] = "Only GET HTTP Rquest Method is Allowed...";
}
echo json_encode($arr);

?>
