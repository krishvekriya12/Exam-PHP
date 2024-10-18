<?php

header("Access-Control-Allow-Method: POST");
header("Content-Type: application/json");

include "../config/config.php";

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    $res = $config->fetchsinglerailwayticketbooking($id);
    $result = mysqli_fetch_assoc($res);

    if ($result) {
        $arr['data'] = $result;
    } else {
        $arr['data'] = 'Not Found....';
    }

} else {
    $arr['err'] = "Only GET HTTP Rquest Method is Allowed...";
}
echo json_encode($arr);

?>
