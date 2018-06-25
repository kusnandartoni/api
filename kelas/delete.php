<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credentials: true");
    header('Content-Type: application/json');
    
    
    include_once '../config/database.php';
    include_once '../objects/kelas.php';

    $database = new Database();
    $db = $database->getConnection();

    $kelas = new Kelas($db);

    $kelas->nisn = isset($_GET['nisn']) ? $_GET['nisn'] : die();
    $kelas->periode = isset($_GET['periode']) ? $_GET['periode'] : die();

    if(strlen($kelas->nisn)>0){
        if($kelas->delete()){
            echo json_encode(
                array(
                    "result"=>"1",
                    "message"=>"nisn($kelas->nisn) Berhasil dihapus"
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