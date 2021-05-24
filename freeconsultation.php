<?php
include('services/customer.php');
$result = [];
$httpState = '';

$cb = new FreeConsultRegister;

$q = $_POST['queryData'];
$q = json_decode($q);

$send = $cb->SendData($q);

if($send['type'] == 'success'){ $httpState = '200 OK'; }
else{ $httpState = '502 Bad Gateway'; }

$result['result'] = $send['response'];

header('Content-Type: application/json; charset=utf-8');
header($_SERVER['SERVER_PROTOCOL'] . ' ' . $httpState);
echo json_encode($result);