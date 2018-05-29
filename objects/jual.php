<?php
    class Jual{
        private $conn;
        private $table_name = "tb_jual";

        public $id;
        public $clientId;
        public $jumlah;
        public $harga;
        public $tglJual;
        public $wktInput;
        public $status;
        public $query;

        public function __construct($db){
            $this->conn = $db;
        }

        function read(){
            $query = "SELECT id, clientId, jumlah, harga, tglJual, wktInput, status ";
            $query.= "FROM ".$this->table_name;
            $query.= " WHERE clientId = '".$this->clientId."' ORDER BY wktInput DESC ";
            $this->query = $query;            
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->clientId);
            $stmt->execute();
            return $stmt;
        }

        function create(){

            //seting tanggal jual
            $getDate = getdate(date("U"));
            $dt = $getDate["mday"];
            if(strlen($getDate["mday"])<2){
                $dt="0".$getDate["mday"];
            }
            $sellDate = $dt.' '.substr($getDate["month"],0,3).' '.substr($getDate["year"],2,2);

            //main query for create
            $query = "INSERT INTO
                        ".$this->table_name." 
                        (id,
                        clientId,
                        jumlah,
                        harga,
                        tglJual,
                        wktInput,
                        status)
                    VALUES
                        (:id,
                        :clientId,
                        :jumlah,
                        :harga,
                        :tglJual,
                        getdate(),
                        :status)
                    ";

            $stmt = $this->conn->prepare($query);
            $this->id = htmlspecialchars(strip_tags($this->id));
            $this->clientId = htmlspecialchars(strip_tags($this->clientId));
            $this->jumlah = htmlspecialchars(strip_tags($this->jumlah));
            $this->harga = htmlspecialchars(strip_tags($this->harga));
            $this->tglJual = htmlspecialchars(strip_tags($sellDate));
            $this->status = htmlspecialchars(strip_tags($this->status));
            
            $stmt->bindParam(":id",$this->id);
            $stmt->bindParam(":clientId",$this->clientId);
            $stmt->bindParam(":jumlah",$this->jumlah);
            $stmt->bindParam(":harga",$this->harga);
            $stmt->bindParam(":tglJual",$this->tglJual);
            $stmt->bindParam(":status",$this->status);

            if($stmt->execute()){
                $this->query = $query;
                return true;
            }else{
                $this->query = $query;
                return false;
            }
        }

        function export(){
            $getDate = getdate(date("U"));
            $dt = $getDate["mday"];
            if(strlen($getDate["mday"])<2){
                $dt="0".$getDate["mday"];
            }

            $sellDate = $dt.' '.substr($getDate["month"],0,3).' '.substr($getDate["year"],2,2);

            $query = "SELECT id, clientId, jumlah, harga, tglJual, wktInput 
                     FROM 
                        ".$this->table_name.
                    " WHERE
                        tglJual = ? 
                    ";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $sellDate);
            $stmt->execute();
            return $stmt;
        }

        function getAdmin(){
            $query = "SELECT id, clientId, jumlah, harga, tglJual, wktInput, status 
                     FROM 
                        ".$this->table_name.
                    " WHERE
                        tglJual = ? 
                      AND NOT 
                        clientID = '' 
                      AND 
                        status not in ('cancel')
                    ";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->tglJual);
            $stmt->execute();
            return $stmt;
        }

        function update(){
            $getDate = getdate(date("U"));
            $dt = $getDate["mday"];
            if(strlen($getDate["mday"])<2){
                $dt="0".$getDate["mday"];
            }

            $sellDate = $dt.' '.substr($getDate["month"],0,3).' '.substr($getDate["year"],2,2);
            $query = "UPDATE 
                        ".$this->table_name.
                    " SET 
                        status = 'cancel'
                      WHERE 
                        clientId=:clientId
                      AND 
                        tglJual=:tglJual
                      AND 
                        status = 'sent'
                    ";

            $stmt = $this->conn->prepare($query);
            $this->clientId = htmlspecialchars(strip_tags($this->clientId));
            $this->jumlah = htmlspecialchars(strip_tags($this->jumlah));
            $this->harga = htmlspecialchars(strip_tags($this->harga));
            $this->tglJual = htmlspecialchars(strip_tags($sellDate));
            $this->status = htmlspecialchars(strip_tags($this->status));

            $stmt->bindParam(":clientId",$this->clientId);
            $stmt->bindParam(":tglJual",$this->tglJual);

            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }

        function getLastNo(){
            $query = "SELECT MAX(id) as nmr FROM ".$this->table_name." ";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $num=$stmt->rowCount();
            // if($num < 1){
                // $this->id = 1;
            // }else{
                $row = $stmt->fetch(PDO::FETCH_ASSOC);    
                $last = $row['nmr'];
                $this->id = ($last + 1);
            // }
            return $last;
        }

    }
?>