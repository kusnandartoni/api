<?php
    class Login{

        private $conn;
        private $table_name = "tb_login";

        public $clientId;
        public $password;
        public $nama;
        public $level;

        public function __construct($db){
            $this->conn = $db;
        }

        function read(){
            $query = "SELECT
                        clientId, password, nama, level
                    FROM 
                        ". $this->table_name ."
                    ";
            $stmt = $this->conn->prepare($query);

            $stmt->execute();

            return $stmt;
        }

        function readOne(){
            $query="SELECT 
                        clientId, password, nama, level
                    FROM 
                        ".$this->table_name ."
                    WHERE
                        clientId = ?
                ";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->clientId);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->clientId = $row['clientId'];
            $this->password = $row['password'];
            $this->nama = $row['nama'];
            $this->level = $row['level'];
        }

        function create(){
            $query = "INSERT INTO 
                        ".$this->table_name." 
                        (clientId,
                        password,
                        nama,
                        [level])
                    VALUES
                        (:clientId, 
                        :password,
                        :nama,
                        :level) 
                    ";
            $stmt = $this->conn->prepare($query);
            $this->clientId=htmlspecialchars(strip_tags($this->clientId));
            $this->password=htmlspecialchars(strip_tags($this->password));
            $this->nama=htmlspecialchars(strip_tags($this->nama));
            $this->level=htmlspecialchars(strip_tags($this->level));

            $stmt->bindParam(":clientId", $this->clientId);
            $stmt->bindParam(":password", $this->password);
            $stmt->bindParam(":nama", $this->nama);
            $stmt->bindParam(":level", $this->level);

            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }
        
        function update(){
            $query = "UPDATE 
                        " . $this->table_name ." 
                    SET 
                        password = :password,
                        nama = :nama,
                        [level] = :level 
                    WHERE 
                        clientId = :clientId";
            
            $stmt = $this->conn->prepare($query);

            $this->clientId=htmlspecialchars(strip_tags($this->clientId));
            $this->password=htmlspecialchars(strip_tags($this->password));
            $this->nama=htmlspecialchars(strip_tags($this->nama));
            $this->level=htmlspecialchars(strip_tags($this->level));

            $stmt->bindParam(":clientId", $this->clientId);
            $stmt->bindParam(":password", $this->password);
            $stmt->bindParam(":nama", $this->nama);
            $stmt->bindParam(":level", $this->level);

            if($stmt->execute()){
                return true;
            }else{
                return false;
            }

        }
    }
?>