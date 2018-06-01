<?
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once '../config/database.php';
    include_once '../objects/siswa.php';

    $database = new Database();
    $db = $database->getConnection();

    $siswa = new Siswa($db);

    $stmt = $siswa->read();
    $num = $stmt->rowCount();

    $siswas_arr=array();
    $siswas_arr["result"]="1";
    $siswas_arr["records"]=array();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $siswas_item=array(
            "nisn" => $nisn,
            "nama" => $nama,
            "tgl_lahir" => $tgl_lahir,
            "tpt_lahir" => $tpt_lahir,
            "agama" => $agama,
            "alamat" => $alamat,
            "nama_ayah" => $nama_ayah,
            "nama_ibu" => $nama_ibu,
            "pekerjaan_ayah" => $pekerjaan_ayah,
            "pekerjaan_ibu" => $pekerjaan_ibu,
            "alamat_ortu" => $alamat_ortu
        );
        array_push($siswas_arr["records"],$siswas_item);
    }
    echo json_encode($siswas_arr);
?>

