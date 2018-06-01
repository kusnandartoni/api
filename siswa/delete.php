<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credentials: true");
    header('Content-Type: application/json');
    
    include_once '../config/database.php';
    include_once '../objects/siswa.php';

    $database = new Database();
    $db = $database->getConnection();

    $siswa = new Siswa($db);

    $siswa->nisn = isset($_GET['nisn']) ? $_GET['nisn'] : die();

    if(strlen($siswa->nisn)>0){
        if($siswa->delete()){
            echo json_encode(
                array(
                    "result"=>"1",
                    "message"=>"nisn($siswa->nisn) Berhasil dihapus"
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
                "message"=>"tnisnak ada data"
                )
        );
    }
?>