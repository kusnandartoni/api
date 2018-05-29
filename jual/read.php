<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once '../config/database.php';
    include_once '../objects/jual.php';

    $database = new Database();
    $db = $database->getConnection();

    $jual = new Jual($db);

    $jual->clientId = isset($_GET['clientId']) ? $_GET['clientId'] : die();

    $stmt = $jual->read();
    $num = $stmt->rowCount();

    //  if($num>0){
        $jual_arr = array();
        $jual_arr["result"]="1";
        $jual_arr["qry"]=$jual->query;
        $jual_arr["records"]=array();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $juals_item=array(
                "id"=>$id,
                "clientId"=>$clientId,
                "jumlah"=>$jumlah,
                "harga"=>$harga,
                "tglJual"=>$tglJual,
                "wktInput"=>$wktInput,
                "status"=>$status,
                
            );
            array_push($jual_arr["records"],$juals_item);
        }
        echo json_encode($jual_arr);
    // }else{
    //     echo json_encode(
    //         array(
    //             "result"=>"0",
    //             "message"=>"No User found.",
    //             "cid"=>$jual->clientId,
    //             "qry"=>$jual->query,
    //             "num"=>$num
    //             )
    //     );
    // }
?>