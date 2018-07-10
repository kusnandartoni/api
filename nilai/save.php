<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST, GET");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once '../config/database.php';
    include_once '../objects/nilai.php';

    $database = new Database();
    $db = $database->getConnection();

    $nilai = new Nilai($db);

    // $nilai->periode = isset($_GET['periode']) ? $_GET['periode'] : die();
    // $nilai->nisn = isset($_GET['nisn']) ? $_GET['nisn'] : die();
    // $nilai->kd_pelajaran = isset($_GET['kd_pelajaran']) ? $_GET['kd_pelajaran'] : die();
    // $nilai->kkm = isset($_GET['kkm']) ? $_GET['kkm'] : die();
    // $nilai->nilai = isset($_GET['nilai']) ? $_GET['nilai'] : die();

    $data = json_decode(file_get_contents("php://input"));

    $nilai->periode = $data->periode;
    $nilai->nisn = $data->nisn;
    $nilai->kd_pelajaran = $data->kd_pelajaran;
    $nilai->kkm = $data->kkm;
    $nilai->nilai = $data->nilai;
    
    if(strlen($nilai->nisn)>0){
        if($nilai->create()){
            echo json_encode(
                array(
                    "result"=>"1",
                    "message"=>"Berhasil tambah data",
                    "errMessage"=>$nilai->errMsg[1]
                    )
            );
        }elseif ($nilai->update()) {
            echo json_encode(
                array(
                    "result"=>"1",
                    "message"=>"Berhasil ubah data"
                    )
            );
        }else{
            echo json_encode(
                array(
                    "result"=>"0",
                    "message"=>"Gagal tambah data",
                    "errMessage"=>$nilai->errMsg
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