<?php
class Pelajaran{
    private $conn;
    private $table_name = "tb_pelajaran";

    public $kd_pelajaran;
    public $nama_pelajaran;

    public function __construct($db){
        $this->conn = $db;
    }

    function read(){
        $query = "SELECT
                    kd_pelajaran,nama_pelajaran
                FROM
                    ".$this->table_name."
                    ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function create(){
        // $query = "INSERT INTO 
        //             ".$this->table_name." 
        //           SET
        //             periode=:periode,
        //             nisn=:nisn,
        //             kd_kelas=:kd_kelas,
        //             tahun_ajaran=:tahun_ajaran,
        //             semester=:semester
        //           ";

        // $stmt = $this->conn->prepare($query);

        // $this->periode=htmlspecialchars(strip_tags($this->periode));
        // $this->nisn=htmlspecialchars(strip_tags($this->nisn));
        // $this->kd_kelas=htmlspecialchars(strip_tags($this->kd_kelas));
        // $this->tahun_ajaran=htmlspecialchars(strip_tags($this->tahun_ajaran));
        // $this->semester=htmlspecialchars(strip_tags($this->semester));

        // $stmt->bindParam(":periode", $this->periode);
        // $stmt->bindParam(":nisn", $this->nisn);
        // $stmt->bindParam(":kd_kelas", $this->kd_kelas);
        // $stmt->bindParam(":tahun_ajaran", $this->tahun_ajaran);
        // $stmt->bindParam(":semester", $this->semester);

        // if($stmt->execute()){
        //     $this->errMsg = $stmt->errorInfo();
        //     return true;
        // }else{
        //     $this->errMsg = $stmt->errorInfo();
        //     return false;
        // }
    }

    function delete(){
        // $query = "DELETE FROM
        //             ".$this->table_name." 
        //           WHERE nisn =:nisn 
        //           AND periode =:periode
        //         ";
        // $stmt = $this->conn->prepare($query);
        // $this->nisn=htmlspecialchars(strip_tags($this->nisn));
        // $this->periode=htmlspecialchars(strip_tags($this->periode));        
        // $stmt->bindParam(":periode", $this->periode);
        // $stmt->bindParam(":nisn", $this->nisn);

        // if($stmt->execute()){
        //     return true;
        // }else{
        //     return false;
        // }
    }

    function readOne(){
        // $query = "SELECT
        //              A.nisn as nisn, B.nama as nama, A.kd_kelas as kelas
        //         FROM ".$this->table_name." A 
        //         INNER JOIN tb_siswa B 
        //         ON (A.nisn = B.nisn)
        //         WHERE A.periode = :periode
        //         AND A.nisn = :nisn
        //     ";

        // $stmt = $this->conn->prepare($query);
        // $this->nisn=htmlspecialchars(strip_tags($this->nisn));        
        // $this->periode=htmlspecialchars(strip_tags($this->periode));        
        // $stmt->bindParam(":nisn", $this->nisn);
        // $stmt->bindParam(":periode", $this->periode);
        
        // $stmt->execute();
        // $row = $stmt->fetch(PDO::FETCH_ASSOC);    

        // $this->nisn=$row['nisn'];
        // $this->nama=$row['nama'];
        // $this->kelas=$row['kelas'];
    }

    function update(){
        // $query = "UPDATE 
        //             " . $this->table_name ." 
        //         SET 
        //             kd_kelas = :kd_kelas
        //         WHERE 
        //             nisn = :nisn
        //         AND periode =:periode
        //         ";
        
        // $stmt = $this->conn->prepare($query);
        // $this->errMsg = $query;
        // $this->nisn=htmlspecialchars(strip_tags($this->nisn));
        // $this->periode=htmlspecialchars(strip_tags($this->periode));
        // $this->kd_kelas=htmlspecialchars(strip_tags($this->kd_kelas));

        // $stmt->bindParam(":nisn", $this->nisn);
        // $stmt->bindParam(":kd_kelas", $this->kd_kelas);
        // $stmt->bindParam(":periode", $this->periode);

        // if($stmt->execute()){
        //     return true;
        // }else{
        //     return false;
        // }

    }

}
?>