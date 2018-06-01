<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST, GET");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once '../config/database.php';
    include_once '../objects/siswa.php';

    $database = new Database();
    $db = $database->getConnection();

    $siswa = new Siswa($db);
    // $siswa->nisn = isset($_GET['nisn']) ? $_GET['nisn'] : die();
    // $siswa->nama = isset($_GET['nama']) ? $_GET['nama'] : die();
    // $siswa->tgl_lahir = isset($_GET['tgl_lahir']) ? $_GET['tgl_lahir'] : die();

    $data = json_decode(file_get_contents("php://input"));

    $siswa->nisn = $data->nisn;
    $siswa->nama = $data->nama;
    $siswa->tgl_lahir = $data->tgl_lahir;

    if(strlen($siswa->nisn)>0){
        if($siswa->create()){
            echo json_encode(
                array(
                    "result"=>"1",
                    "message"=>"Berhasil tambah data"
                    )
            );
        }else{
            echo json_encode(
                array(
                    "result"=>"0",
                    "message"=>"Gagal tambah data"
                    )
            );
        }
    }else{
        echo json_encode(
            array(
                "result"=>"0",
                "message"=>"No Data"
                )
        );
    }
?>