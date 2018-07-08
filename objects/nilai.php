<?php

class Nilai{

    private $conn;
    private $table_name = "tb_kelas_siswa_pelajaran";

    public $periode;
    public $nisn;
    public $kd_pelajaran;
    public $kkm;
    public $nilai;

    public $tahun_ajaran;
    public $kd_kelas;
    public $semester;

    public function __construct($db){
        $this->conn = $db;
    }

   function readSiswaInClass(){
        $query= "
                SELECT 
                    A.nisn, 
                    B.nama, 
                    A.kkm, 
                    A.nilai 
                FROM ".$this->table_name." A
                INNER JOIN tb_siswa B
                ON(A.nisn = B.nisn)
                WHERE A.periode = :periode
                AND A.kd_pelajaran = :kd_pelajaran
                AND A.nisn in
                (SELECT DISTINCT(N.nisn) 
                FROM tb_kelas_siswa N
                WHERE N.tahun_ajaran = :tahun_ajaran
                AND N.kd_kelas = :kd_kelas
                AND N.semester = :semester) 
                UNION
                SELECT
                    DISTINCT(D.nisn) as nisn, 
                    E.nama as nama, 
                    '0' as kkm,
                    '0' as nilai
                FROM tb_kelas_siswa D 
                INNER JOIN tb_siswa E 
                ON (D.nisn = E.nisn)
                WHERE D.tahun_ajaran = :tahun_ajaran
                AND D.kd_kelas = :kd_kelas
                AND D.semester = :semester 
                AND D.nisn not in
                (SELECT DISTINCT(K.nisn) 
                FROM ".$this->table_name." K
                WHERE K.periode = :periode
                AND K.kd_pelajaran = :kd_pelajaran
                ) 
        ";
        $stmt = $this->conn->prepare($query);
        $this->tahun_ajaran=htmlspecialchars(strip_tags($this->tahun_ajaran));
        $this->kd_kelas=htmlspecialchars(strip_tags($this->kd_kelas));
        $this->semester=htmlspecialchars(strip_tags($this->semester));
        $this->periode=htmlspecialchars(strip_tags($this->periode));
        $this->kd_pelajaran=htmlspecialchars(strip_tags($this->kd_pelajaran));
        $stmt->bindParam("tahun_ajaran", $this->tahun_ajaran);
        $stmt->bindParam("kd_kelas", $this->kd_kelas);
        $stmt->bindParam("semester", $this->semester);
        $stmt->bindParam("periode", $this->periode);
        $stmt->bindParam("kd_pelajaran", $this->kd_pelajaran);
        $stmt->execute();
        return $stmt;
   } 
}

?>