<?php


header("Access-Control-Allow-Method: DELETE");
header("Content-Type: application/json");


include "../config/config.php";

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {


    $input = file_get_contents('php://input');
    parse_str($input,$_DELETE);
    $id = $_DELETE['id'];
    $res = $config->deleterailwayticketbooking($id);

    if($res)
    {
        $arr['data'] = "Recored Deleted Successfully";
    }
    else
    {
        $arr['data'] = "Recored Deletion Unsuccessfully";
    }


} else {

    $arr['err'] = "Only for DELETE HTTP Request Method is Allowed";
}
echo json_encode($arr);




?>