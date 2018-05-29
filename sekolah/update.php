<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
	     
    include_once '../config/database.php';

    include_once '../objects/sekolah.php';

	$database = new Database();
	$db = $database->getConnection();
	 
    $sekolah = new Sekolah($db);
	 
    // get posted data
    $data = json_decode(file_get_contents("php://input"));

    $sekolah->nama = $data->nama;
    $sekolah->alamat = $data->alamat;
    $sekolah->telp = $data->telp;
    $sekolah->fax = $data->fax;
    $sekolah->email = $data->email;
	 
	// update the product
	if($sekolah->update()){
        echo json_encode(
            array(
                "result"=>"1",
                "message"=>"Data berhasil diubah",
                "data"=>$data->nama
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