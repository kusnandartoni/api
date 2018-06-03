<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST, GET");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once '../config/database.php';
    include_once '../objects/kelas.php';

    $database = new Database();
    $db = $database->getConnection();

    $kelas = new Kelas($db);

    // $kelas->periode = isset($_GET['periode']) ? $_GET['periode'] : die();
    // $kelas->nisn = isset($_GET['nisn']) ? $_GET['nisn'] : die();
    // $kelas->kd_kelas = isset($_GET['kd_kelas']) ? $_GET['kd_kelas'] : die();
    // $kelas->tahun_ajaran = isset($_GET['tahun_ajaran']) ? $_GET['tahun_ajaran'] : die();
    // $kelas->semester = isset($_GET['semester']) ? $_GET['semester'] : die();

    $data = json_decode(file_get_contents("php://input"));

    $kelas->periode = $data->periode;
    $kelas->nisn = $data->nisn;
    $kelas->kd_kelas = $data->kd_kelas;
    $kelas->tahun_ajaran = $data->tahun_ajaran;
    $kelas->semester = $data->semester;
    
    if(strlen($kelas->nisn)>0){
        if($kelas->create()){
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