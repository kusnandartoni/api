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
    
    $artikel->readOne();

    $artikel_arr = array(
        "result"=>"1",        
        "id" => trim($artikel->id),
        "judul" => trim($artikel->judul),
        "tanggal" => trim($artikel->tanggal),
        "gambar" => trim($artikel->gambar),
        "isi" => trim($artikel->isi)
    );

    if(! $artikel->judul == null){
        print_r(json_encode($artikel_arr));
    }else{
        echo json_encode(
            array(
                "result"=>"0",
                "message"=>"No User found.",
                "res"=>$artikel->res
                )
        );
    }
?>