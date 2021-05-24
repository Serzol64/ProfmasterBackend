<?php
include('services/customer.php');
$result = array();
$httpState = '';

$cb = new FreeConsultRegister;

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $q = json_decode($_POST['queryData']);

    $send = $cb->SendData($q);

    if($send['type'] == 'success'){ $httpState = '200 OK'; }
    else{ $httpState = '502 Bad Gateway'; }

    $result['result'] = $send['response'];

}
else{
    $httpState = '404 Not Found';
    $result['result'] = 'Not found';
}

header('Content-Type: application/json; charset=utf-8');
header($_SERVER['SERVER_PROTOCOL'] . ' ' . $httpState);
echo json_encode($result);