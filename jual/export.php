<?php
    header("Access-Control-Allow-Origin: *");
  //  header("Content-Type: application/json; charset=UTF-8");
    header("Content-type: application/octet-stream");  
    header("Content-Disposition: attachment; filename=export.xls");  
    header("Pragma: no-cache");  
    header("Expires: 0");
    include_once '../config/database.php';
    include_once '../objects/jual.php';

    $database = new Database();
    $db = $database->getConnection();

    $jual = new Jual($db);

    $stmt = $jual->export();
    $num = $stmt->rowCount();

    $columnHeader = '';  
    $columnHeader = "ID" . "\t" . "ClientId" . "\t" . "Jumlah" . "\t". "Harga" . "\t". "Tgl Jual" . "\t". "Waktu Input" . "\t";  
    $setData = '';  

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $rowData = '';
        foreach ($row as $value){
            $value = '"' . $value . '"' . "\t";  
            $rowData .= $value;  
        }
        $setData .= trim($rowData) . "\n";  
    }

    echo ucwords($columnHeader) . "\n" . $setData . "\n";  


?>