<?php
include('services/call.php');
$result = [];
$httpState = '';

$cb = new Backcall;

$q = $_POST['phone'];
$q = trim($q);

$send = $cb->SendData($q);

if($send['type'] == 'success'){ $httpState = '200 OK'; }
else{ $httpState = '502 Bad Gateway'; }

$result['result'] = $send['response'];


header('Content-Type: application/json; charset=utf-8');
header($_SERVER['SERVER_PROTOCOL'] . ' ' . $httpState);
echo json_encode($result);