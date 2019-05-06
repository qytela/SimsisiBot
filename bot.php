<?php
/*
Created by: Fansa
https://github.com/qytela
*/
date_default_timezone_set('Asia/Jakarta');
$message = $_POST['message'];
if ($message == '' || $message == null) {
    $result['response'] = 'Sisi tidak mengerti ucapanmu.';
    $result['botName'] = 'Sisi';
    $result['time'] = date('H:i');
    die(json_encode($result));
}else if ($message) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://sandbox.api.simsimi.com/request.p?key=aa78c2fe-c0d1-4aa8-b3ca-74799b0648f2&lc=id&ft=1.0&text='.$message);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
    $ex = curl_exec($ch);
    curl_close($ch);
    $dec = json_decode($ex);
    $result['response'] = $dec->response;
    $result['botName'] = 'Sisi';
    $result['time'] = date('H:i');
    die(json_encode($result));
}else{
    header('Location: ./');
}