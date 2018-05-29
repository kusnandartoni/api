<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credentials: true");
    header('Content-Type: application/json');

    include_once '../config/database.php';
    include_once '../objects/sekolah.php';

    $database = new Database();
    $db = $database->getConnection();

    $sekolah = new Sekolah($db);

    $sekolah->readOne();

    $sekolah_arr = array(
        "result"=>"1",        
        "nama" => trim($sekolah->nama),
        "alamat" => trim($sekolah->alamat),
        "telp" => trim($sekolah->telp),
        "fax" => trim($sekolah->fax),
        "email" => trim($sekolah->email)
    );

    if(! $sekolah->nama == null){
        print_r(json_encode($sekolah_arr));
    }else{
        echo json_encode(
            array(
                "result"=>"0",
                "message"=>"No User found.",
                "res"=>$sekolah->res
                )
        );
    }
?>