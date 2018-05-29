<?php
class Artikel{
    private $conn;
    private $table_name = "tb_artikel";

    public $id;
    public $judul;
    public $tanggal;
    public $gambar;
    public $isi;
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

    // id,
    // judul,
    // tanggal,
    // gambar,
    // isi,

    function readOne(){
        $query = "SELECT
                    id,judul,tanggal,gambar,isi
                FROM
                    ".$this->table_name ." 
                WHERE id = :id
            ";
        $stmt = $this->conn->prepare($query);
        $this->id=htmlspecialchars(strip_tags($this->id));        
        $stmt->bindParam(":id", $this->id);
        

        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);    
        
        // $this->res = $query;
        $this->id= $row['id'];
        $this->judul= $row['judul'];
        $this->tanggal= $row['tanggal'];
        $this->gambar= $row['gambar'];
        $this->isi= $row['isi'];
    }
    
    function read(){
        $query = "SELECT
                    id,judul,tanggal,gambar,isi
                FROM
                    ".$this->table_name."
                    ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $this->query = $query;
        return $stmt;
    }
}
?>