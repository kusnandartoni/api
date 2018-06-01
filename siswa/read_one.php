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
    
    $siswa->readOne();

    $siswa_arr = array(
        "result"=>"1",        
        "nisn" => trim($siswa->nisn),
        "nama" => trim($siswa->nama),
        "tgl_lahir" => trim($siswa->tgl_lahir),
        "tpt_lahir" => trim($siswa->tpt_lahir),
        "agama" => trim($siswa->agama),
        "alamat" => trim($siswa->alamat),
        "nama_ayah" => trim($siswa->nama_ayah),
        "nama_ibu" => trim($siswa->nama_ibu),
        "pekerjaan_ayah" => trim($siswa->pekerjaan_ayah),
        "pekerjaan_ibu" => trim($siswa->pekerjaan_ibu),
        "alamat_ortu" => trim($siswa->alamat_ortu),
    );

    if(! $siswa->nisn == null){
        print_r(json_encode($siswa_arr));
    }else{
        echo json_encode(
            array(
                "result"=>"0",
                "message"=>"No User found."
                )
        );
    }
?>