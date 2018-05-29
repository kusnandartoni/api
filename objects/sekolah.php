<?php
class Sekolah{
    private $conn;
    private $table_name = "tb_sekolah";

    public $nama;
    public $alamat;
    public $telp;
    public $fax;
    public $email;
    public $res;

    public function __construct($db){
        $this->conn = $db;
    }

    function update(){
        $query = "UPDATE 
                    " . $this->table_name ." 
                SET 
                    nama = :nama,
                    alamat = :alamat,
                    telp = :telp,
                    fax = :fax,
                    email = :email";
        
        $stmt = $this->conn->prepare($query);

        $this->nama=htmlspecialchars(strip_tags($this->nama));
        $this->alamat=htmlspecialchars(strip_tags($this->alamat));
        $this->telp=htmlspecialchars(strip_tags($this->telp));
        $this->fax=htmlspecialchars(strip_tags($this->fax));
        $this->email=htmlspecialchars(strip_tags($this->email));

        $stmt->bindParam(":nama", $this->nama);
        $stmt->bindParam(":alamat", $this->alamat);
        $stmt->bindParam(":telp", $this->telp);
        $stmt->bindParam(":fax", $this->fax);
        $stmt->bindParam(":email", $this->email);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }

    }

    function readOne(){
        $query = "SELECT
                    nama, alamat, telp, fax, email 
                FROM
                    ".$this->table_name ." 
                LIMIT 0,1
            ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);    
        
        $this->res = $query;
        $this->nama= $row['nama'];
        $this->alamat= $row['alamat'];
        $this->telp= $row['telp'];
        $this->fax= $row['fax'];
        $this->email= $row['email'];
    }


}
?>