<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credentials: true");
    header('Content-Type: application/json');
    
    
    include_once '../config/database.php';
    include_once '../objects/artikel.php';

    $database = new Database();
    $db = $database->getConnection();

    $artikel = new Artikel($db);

    $artikel->id = isset($_GET['id']) ? $_GET['id'] : die();

    if(strlen($artikel->id)>0){
        if($artikel->delete()){
            echo json_encode(
                array(
                    "result"=>"1",
                    "message"=>"id($artikel->id) Berhasil dihapus"
                    )
            );
        }else{
            echo json_encode(
                array(
                    "result"=>"0",
                    "message"=>"Gagal hapus data"
                    )
            );
        }
    }else{
        echo json_encode(
            array(
                "result"=>"0",
                "message"=>"tidak ada data"
                )
        );
    }
?>