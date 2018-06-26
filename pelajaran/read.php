<?php
    //required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    // include database and object files
    include_once '../config/database.php';
    include_once '../objects/pelajaran.php';

    // instantiate database and pelajaran object
    $database = new Database();
    $db = $database->getConnection();

    // initialize object
    $pelajaran = new Pelajaran($db);

    // query pelajarans
    $stmt = $pelajaran->read();
    $num = $stmt->rowCount();

    $pelajarans_arr=array();
    $pelajarans_arr["result"]="1";
    $pelajarans_arr["records"]=array();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $pelajarans_item=array(
            "kd_pelajaran" => $kd_pelajaran,
            "nama_pelajaran" => $nama_pelajaran
        );
        array_push($pelajarans_arr["records"],$pelajarans_item);
    }
    echo json_encode($pelajarans_arr);

?>