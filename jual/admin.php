<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once '../config/database.php';
    include_once '../objects/jual.php';

    $database = new Database();
    $db = $database->getConnection();

    $jual = new Jual($db);

    $jual->tglJual = isset($_GET['tglJual']) ? $_GET['tglJual'] : die();

    $stmt = $jual->getAdmin();
    $num = $stmt->rowCount();

    // if($num>0){
    $jual_arr = array();
    $jual_arr["result"]="1";
    $jual_arr["records"]=array();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $juals_item=array(
            "clientId"=>$clientId,
            "bs"=>'S',
            "stock"=>'BBCA',
            "share"=>$jumlah%100,
            "jumlah"=>floor($jumlah/100),
            "harga"=>$harga,
            "market"=>'M',
            "state"=>'DAY',
            "sendTime"=>$status
        );
        array_push($jual_arr["records"],$juals_item);
    }
    echo json_encode($jual_arr);
    // }else{
    //     echo json_encode(
    //         array(
    //             "result"=>"0",
    //             "tglJual"=>$_GET['tglJual'],
    //             "message"=>"No User found."
    //             )
    //     );
    // }
?>