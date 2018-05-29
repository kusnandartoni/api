<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../config/database.php';
    include_once '../objects/login.php';
    
    $database = new Database();
    $db = $database->getConnection();

    $login = new Login($db);
    
    $data = json_decode(file_get_contents("php://input"));
    $login->clientId = $data->clientId;
    $pass = md5($data->password);

    $login->readOne();

    $auth = ($login->password == $pass);

    $login_arr = array(
        "result"=>"1",        
        "clientId" => trim($login->clientId),
        "auth"=> $auth,
        // "password" => trim($login->password),
        "nama" => trim($login->nama),
        "level" => trim($login->level)
    );
    if(! $login->clientId == null){
        print_r(json_encode($login_arr));
    }else{
        echo json_encode(
            array(
                "result"=>"0",
                "message"=>"No User found"
                )
        );
    }
?>