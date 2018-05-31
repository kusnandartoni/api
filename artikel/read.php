<?php
    //required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    // include database and object files
    include_once '../config/database.php';
    include_once '../objects/artikel.php';

    // instantiate database and artikel object
    $database = new Database();
    $db = $database->getConnection();

    // initialize object
    $artikel = new Artikel($db);

    // query artikels
    $stmt = $artikel->read();
    $num = $stmt->rowCount();

    $artikels_arr=array();
    $artikels_arr["result"]="1";
    $artikels_arr["records"]=array();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $artikels_item=array(
            "id" => $id,
            "judul" => $judul,
            "tanggal" => $tanggal,
            "gambar" => $gambar,
            "isi" => $isi
        );
        array_push($artikels_arr["records"],$artikels_item);
    }
    echo json_encode($artikels_arr);

?>