<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    date_default_timezone_set("Asia/Jakarta");
    // get database connection
    include_once '../config/database.php';

    // instantiate jual object
    include_once '../objects/jual.php';

    $database = new Database();
    $db = $database->getConnection();

    $jual = new Jual($db);

    $jual->getLastNo();
    
    $data = json_decode(file_get_contents("php://input"));

    $jual->clientId = $data->clientId;
    $jual->jumlah = $data->jumlah;
    $jual->harga = $data->harga;
    $jual->tglJual = $data->tglJual;
    $jual->status = $data->status;

    $getDate = getdate(date("U"));
    $tm = $getDate["hours"];

    if($tm > 6 && $tm <15){

        $jual->update();
        if(strlen($data->clientId)>2){
            if($jual->create()){
                echo json_encode(
                    array(
                        "result" => "1",
                        "message" => "Form Berhasil Dikirim "
                        )
                );
            }else{
                echo json_encode(
                    array(
                        "result"=>"0",
                        "message"=>"Gagal Mengirim Form"
                    )
                );
            }
        }else{
            echo json_encode(
                array(
                    "result"=>"0",
                    "message"=>"Tidak ada data"
                )
            );
        }
    }else{
        echo json_encode(
            array(
                "result"=>"0",
                "message"=>"Penjualan saham melalui E-Form hanya bisa dilakukan jam 06.00 - 15.00 WIB"
            )
        ); 
    }

?>