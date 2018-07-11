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
    
    // $nilai->periode = isset($_GET['periode']) ? $_GET['periode'] : die();
    // $nilai->nisn = isset($_GET['nisn']) ? $_GET['nisn'] : die();
    
    $data = json_decode(file_get_contents("php://input"));
    $nilai->periode = $data->periode;
    $nilai->nisn = $data->nisn;

    $stmt = $nilai->readPerSiswa();
    $num = $stmt->rowCount();

    $nilais_arr=array();
    $nilais_arr["result"]="1";
    $nilais_arr["records"]=array();

    if($num>0){
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $nilais_item=array(
                "mapel" => $mapel,
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
                "message"=>"Belum ada siswa di nilai.",
                "query"=>$nilai->msg
                )
        );
    }
?>

