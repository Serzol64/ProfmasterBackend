<?php
include('services/call.php');

$result = [];
$httpState = '';

$cb = new Backcall;
if($_POST['phone']) {
    $q = trim($_POST['phone']);
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