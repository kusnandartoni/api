<?php
    header("Access-Control-Allow-Origin: *");
    //  header("Content-Type: application/json; charset=UTF-8");
      header("Content-type: application/octet-stream");  
      header("Content-Disposition: attachment; filename=oddlot-".$_GET['tglJual'].".xls");  
      header("Pragma: no-cache");  
      header("Expires: 0");

    include_once '../config/database.php';
    include_once '../objects/jual.php';

    $database = new Database();
    $db = $database->getConnection();

    $jual = new Jual($db);

    $jual->tglJual = isset($_GET['tglJual']) ? $_GET['tglJual'] : die();

    $stmt = $jual->getAdmin();
    $num = $stmt->rowCount();



    $columnHeader = '';  
    $columnHeader = "client" . "\t" . "B/S" . "\t" . "Share" . "\t". "Volume(lembar)" . "\t"
                    . "Price" . "\t". "(M)arket/(Limit)" . "\t". "Day/GTC/One" . "\t". "Send Time" . "\t";  
    $setData = '';  

    // if($num>0){
    $jual_arr = array();
    $jual_arr["result"]="1";
    $jual_arr["records"]=array();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        // if($jumlah%100 < 1)continue;
        if($status!='Process' && $status!='sent')continue;
        $rowData = '';
        $rowData .= '"'.$clientId.'"'."\t";
        $rowData .= '"S"'."\t";
        $rowData .= '"BBCA"'."\t";
        $rowData .= '"'.($jumlah%100).'"'."\t";
        $rowData .= '"'.$harga.'"'."\t";
        $rowData .= '"M"'."\t";
        $rowData .= '"DAY"'."\t";
        $rowData .= '""'."\t";

        $setData .= trim($rowData)."\n";
    }
    echo ucwords($columnHeader) . "\n" . $setData . "\n";  
    // }
?>