<?php 
class Database{
    // private $host ='localhost';
    // private $db_name = 'u8575377_db_api';
    // private $username = 'u8575377_toni';
    // private $password = 'Jualan31!';
    private $host ='localhost';
    private $db_name = 'siak';
    private $username = 'root';
    private $password = '';
    public $conn;

    public function getConnection(){
        $this->conn = null;
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            // $this->conn = new PDO("sqlsrv:Server=".$this->host.";Database=".$this->db_name, $this->username, $this->password);
            // $this->con = odbc_connect($this->host, $this->username, $this->password);
            // $this->conn->exec("set names utf8");
        }catch (PDOException $exception){
            echo "Connection error". $exception->getMessage();
        }
        return $this->conn;
    }

}
?>