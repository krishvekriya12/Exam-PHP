<?php


header("Access-Control-Allow-Method: POST,PATCH");
header("Content-Type: application/json");


include "../config/config.php";

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'PUT' || $_SERVER['REQUEST_METHOD'] == 'PATCH') {

    $input = file_get_contents('php://input');
    parse_str($input,$_UPDATE);

    $TrainNumber = $_UPDATE['TrainNumber'];
    $TrainName = $_UPDATE['TrainName'];
    $EmailId = $_UPDATE['EmailId'];
    $id = $_UPDATE['id'];


    $res = $config->updaterailwayticketbooking($TrainNumber, $TrainNumber, $EmailId,$id);

    if ($res) {

        $arr['data'] = "Record Updated Successfully";
        http_response_code(201);
    } else {
        $arr['data'] = "Record Updation Failed";
    }

} else {

    $arr['err'] = "Only for POST HTTP Request Method is Allowed";
}
echo json_encode($arr);




?>