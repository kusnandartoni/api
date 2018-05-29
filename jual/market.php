<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$url = 'https://mobile.bcasekuritas.co.id/json/testTr100000.php';

$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => ''
    )
);

    $context = stream_context_create($option);
    $result = file_get_contents($url, false, $context);
    if ($result === FALSE) { 
        echo "Error!!!";
        
    }
    echo ($result);

?>