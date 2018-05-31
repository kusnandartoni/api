<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
	     
    include_once '../config/database.php';

    include_once '../objects/artikel.php';

	$database = new Database();
	$db = $database->getConnection();
	 
    $artikel = new Artikel($db);
	 
    // get posted data
    $data = json_decode(file_get_contents("php://input"));

    $artikel->id = $data->id;
    $artikel->judul = $data->judul;
    $artikel->tanggal = $data->tanggal;
    $artikel->gambar = $data->gambar;
    $artikel->isi = $data->isi;
	 
	// update the product
	if($artikel->update()){
        echo json_encode(
            array(
                "result"=>"1",
                "message"=>"Data($artikel->id) berhasil diubah"
                )
        );
	}else{
        echo json_encode(
            array(
                "result"=>"0",
                "message"=>"Gagal ubah user"
                )
        );
    }
?>

