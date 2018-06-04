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

    // $kelas->kd_kelas = isset($_GET['kd_kelas']) ? $_GET['kd_kelas'] : die();
    // $kelas->tahun_ajaran = isset($_GET['tahun_ajaran']) ? $_GET['tahun_ajaran'] : die();
    $data = json_decode(file_get_contents("php://input"));
    $kelas->kd_kelas = $data->kd_kelas; 
    $kelas->tahun_ajaran = $data->tahun_ajaran; 
    // echo $kelas->kd_kelas;
    // echo $kelas->tahun_ajaran;
    $stmt = $kelas->readSiswaInClass();
    $num = $stmt->rowCount();

    $kelass_arr=array();
    $kelass_arr["result"]="1";
    $kelass_arr["records"]=array();

    if($num>0){
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $kelass_item=array(
                "nisn" => $nisn,
                "nama" => $nama
            );
            array_push($kelass_arr["records"],$kelass_item);
        }
        echo json_encode($kelass_arr);
    }else{
        echo json_encode(
            array(
                "result"=>"0",
                "message"=>"Belum ada siswa di kelas."
                )
        );
    }
?>

