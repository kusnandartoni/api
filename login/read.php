<?php
    //required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    // include database and object files
    include_once '../config/database.php';
    include_once '../objects/login.php';

    // instantiate database and login object
    $database = new Database();
    $db = $database->getConnection();

    // initialize object
    $login = new Login($db);

    // query logins
    $stmt = $login->read();
    $num = $stmt->rowCount();

    // check if more than 0 record found
    // if($num>0){

        // logins array
        $logins_arr=array();
        $logins_arr["result"]="1";
        $logins_arr["records"]=array();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $logins_item=array(
                "clientId" => trim($clientId),
                "password" => trim($password),
                "nama" => trim($nama),
                "level" => trim($level)
            );
            array_push($logins_arr["records"],$logins_item);
        }
        echo json_encode($logins_arr);
    // }
    // else{
        
    //     echo json_encode(
    //         array(
    //             "result"=>"0",
    //             "message"=>"No User found"
    //             )
    //     );
    // }
?>