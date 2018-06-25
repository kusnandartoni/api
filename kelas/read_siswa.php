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
    
    $kelas->readOne();

    $kelas_arr = array(
        "result"=>"1",        
        "nisn" => trim($kelas->nisn),
        "nama" => trim($kelas->nama),
        "kelas" => trim($kelas->kelas)
    );

    if(! $kelas->nisn == null){
        print_r(json_encode($kelas_arr));
    }else{
        echo json_encode(
            array(
                "result"=>"0",
                "message"=>"No User found."
                )
        );
    }
?>