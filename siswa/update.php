<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
	     
    include_once '../config/database.php';

    include_once '../objects/siswa.php';

	$database = new Database();
	$db = $database->getConnection();
	 
    $siswa = new Siswa($db);
	 
    $data = json_decode(file_get_contents("php://input"));

    $siswa->nisn = $data->nisn;
    $siswa->nama = $data->nama;
    $siswa->tgl_lahir = $data->tgl_lahir;
    $siswa->tpt_lahir = $data->tpt_lahir;
    $siswa->agama = $data->agama;
    $siswa->alamat = $data->alamat;
    $siswa->nama_ayah = $data->nama_ayah;
    $siswa->nama_ibu = $data->nama_ibu;
    $siswa->pekerjaan_ayah = $data->pekerjaan_ayah;
    $siswa->pekerjaan_ibu = $data->pekerjaan_ibu;
    $siswa->alamat_ortu = $data->alamat_ortu;
	 
	if($siswa->update()){
        echo json_encode(
            array(
                "result"=>"1",
                "message"=>"Data($siswa->nisn) berhasil diubah"
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

