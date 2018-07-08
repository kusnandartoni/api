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
    
    // $nilai->tahun_ajaran = isset($_GET['tahun_ajaran']) ? $_GET['tahun_ajaran'] : die();
    // $nilai->kd_kelas = isset($_GET['kd_kelas']) ? $_GET['kd_kelas'] : die();
    // $nilai->semester = isset($_GET['semester']) ? $_GET['semester'] : die();
    // $nilai->periode = isset($_GET['periode']) ? $_GET['periode'] : die();
    // $nilai->kd_pelajaran = isset($_GET['kd_pelajaran']) ? $_GET['kd_pelajaran'] : die();
    
    $data = json_decode(file_get_contents("php://input"));
    $nilai->tahun_ajaran = $data->tahun_ajaran;
    $nilai->kd_kelas = $data->kd_kelas;
    $nilai->semester = $data->semester;
    $nilai->periode = $data->periode;
    $nilai->kd_pelajaran = $data->kd_pelajaran;

    $stmt = $nilai->readSiswaInClass();
    $num = $stmt->rowCount();

    $nilais_arr=array();
    $nilais_arr["result"]="1";
    $nilais_arr["records"]=array();

    if($num>0){
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $nilais_item=array(
                "nisn" => $nisn,
                "nama" => $nama,
                "kkm"  => $kkm,
                "nilai"=> $nilai
            );
            array_push($nilais_arr["records"],$nilais_item);
        }
        echo json_encode($nilais_arr);
    }else{
        echo json_encode(
            array(
                "result"=>"0",
                "message"=>"Belum ada siswa di nilai."
                )
        );
    }
?>

