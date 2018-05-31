<?php
class Artikel{
    private $conn;
    private $table_name = "tb_artikel";

    public $id;
    public $judul;
    public $tanggal;
    public $gambar;
    public $isi;

    public function __construct($db){
        $this->conn = $db;
    }

    function update(){
        $query = "UPDATE 
                    " . $this->table_name ." 
                SET 
                    judul = :judul,
                    tanggal = :tanggal,
                    gambar = :gambar,
                    isi = :isi
                WHERE 
                    id = :id
                ";
        
        $stmt = $this->conn->prepare($query);

        $this->id=htmlspecialchars(strip_tags($this->id));
        $this->judul=htmlspecialchars(strip_tags($this->judul));
        $this->tanggal=htmlspecialchars(strip_tags($this->tanggal));
        $this->gambar=htmlspecialchars(strip_tags($this->gambar));
        $this->isi=htmlspecialchars(strip_tags($this->isi));

        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":judul", $this->judul);
        $stmt->bindParam(":tanggal", $this->tanggal);
        $stmt->bindParam(":gambar", $this->gambar);
        $stmt->bindParam(":isi", $this->isi);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }

    }

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
        return $stmt;
    }

    function create(){
        $query = "INSERT INTO 
                    ".$this->table_name." 
                    (judul,tanggal,gambar,isi)
                VALUES
                    (:judul, now(),:gambar,:isi) 
                ";
        $stmt = $this->conn->prepare($query);

        $this->judul=htmlspecialchars(strip_tags($this->judul));
        $this->gambar=htmlspecialchars(strip_tags($this->gambar));
        $this->isi=htmlspecialchars(strip_tags($this->isi));

        $stmt->bindParam(":judul", $this->judul);
        $stmt->bindParam(":gambar", $this->gambar);
        $stmt->bindParam(":isi", $this->isi);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    function delete(){
        $query = "DELETE FROM
                    ".$this->table_name." 
                  WHERE id =:id 
                ";
        $stmt = $this->conn->prepare($query);
        $this->id=htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(":id", $this->id);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
}
?>