<?php


header("Access-Control-Allow-Method: POST");
header("Content-Type: application/json");


include "../config/config.php";

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $TrainNumber = $_POST['TrainNumber'];
    $TrainName = $_POST['TrainName'];
    $EmailId = $_POST['EmailId'];

    $res = $config->railwayticketbooking($TrainNumber, $TrainNumber, $EmailId);

    if ($res) {

        $arr['data'] = "Record Inserted Successfully";
        http_response_code(201);
    } else {
        $arr['data'] = "Record Insertion Failed";
    }

} else {

    $arr['err'] = "Only for POST HTTP Request Method is Allowed";
}
echo json_encode($arr);




?>