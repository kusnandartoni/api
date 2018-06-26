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

    // $kelas->nisn = isset($_GET['nisn']) ? $_GET['nisn'] : die();
    // $kelas->periode = isset($_GET['periode']) ? $_GET['periode'] : die();
    // $kelas->kd_kelas = isset($_GET['kd_kelas']) ? $_GET['kd_kelas'] : die();
    
    // get posted data
    $data = json_decode(file_get_contents("php://input"));

    $kelas->nisn = $data->nisn;
    $kelas->periode = $data->periode;
    $kelas->kd_kelas = $data->kd_kelas;
	 
	// update the product
	if($kelas->update()){
        echo json_encode(
            array(
                "result"=>"1",
                "message"=>"Data($kelas->nisn) berhasil diubah ke kelas($kelas->kd_kelas)"
                )
        );
	}else{
        echo json_encode(
            array(
                "result"=>"0",
                "message"=>"Gagal ubah user",
                "errMsg"=>$kelas->errMsg
                )
        );
    }
?>

