<?
class Siswa{
    private $conn;
    private $table_name = "tb_siswa";

    public $nisn;
    public $nama;
    public $tgl_lahir;
    public $tpt_lahir;
    public $agama;
    public $alamat;
    public $nama_ayah;
    public $nama_ibu;
    public $pekerjaan_ayah;
    public $pekerjaan_ibu;
    public $alamat_ortu;

    public function __construct($db){
        $this->conn = $db;
    }

    function read(){
        $query = "SELECT
                    nisn,nama,tgl_lahir,tpt_lahir,agama,alamat,nama_ayah,nama_ibu,pekerjaan_ayah,pekerjaan_ibu,alamat_ortu
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
                    (nisn,nama,tgl_lahir)
                VALUES
                    (:nisn,:nama,:tgl_lahir) 
                ";
        $stmt = $this->conn->prepare($query);

        $this->nisn=htmlspecialchars(strip_tags($this->nisn));
        $this->nama=htmlspecialchars(strip_tags($this->nama));
        $this->tgl_lahir=htmlspecialchars(strip_tags($this->tgl_lahir));

        $stmt->bindParam(":nisn", $this->nisn);
        $stmt->bindParam(":nama", $this->nama);
        $stmt->bindParam(":tgl_lahir", $this->tgl_lahir);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    function delete(){
        $query = "DELETE FROM
                    ".$this->table_name." 
                  WHERE nisn =:nisn 
                ";
        $stmt = $this->conn->prepare($query);
        $this->nisn=htmlspecialchars(strip_tags($this->nisn));
        $stmt->bindParam(":nisn", $this->nisn);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    function readOne(){
        $query = "SELECT
                    nisn,nama,tgl_lahir,tpt_lahir,agama,alamat,nama_ayah,nama_ibu,pekerjaan_ayah,pekerjaan_ibu,alamat_ortu
                FROM
                    ".$this->table_name ." 
                WHERE nisn = :nisn
            ";
        $stmt = $this->conn->prepare($query);
        $this->nisn=htmlspecialchars(strip_tags($this->nisn));        
        $stmt->bindParam(":nisn", $this->nisn);
        
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);    

        $this->nisn=$row['nisn'];
        $this->nama=$row['nama'];
        $this->tgl_lahir=$row['tgl_lahir'];
        $this->tpt_lahir=$row['tpt_lahir'];
        $this->agama=$row['agama'];
        $this->alamat=$row['alamat'];
        $this->nama_ayah=$row['nama_ayah'];
        $this->nama_ibu=$row['nama_ibu'];
        $this->pekerjaan_ayah=$row['pekerjaan_ayah'];
        $this->pekerjaan_ibu=$row['pekerjaan_ibu'];
        $this->alamat_ortu=$row['alamat_ortu'];
    }

    function update(){
        $setup = '';
        if(strlen($this->tpt_lahir)>0){
            $setup .= " tpt_lahir = :tpt_lahir,";
        }
        if(strlen($this->agama)>0){
            $setup .= " agama = :agama,";
        }
        if(strlen($this->alamat)>0){
            $setup .= " alamat = :alamat,";
        }
        if(strlen($this->nama_ayah)>0){
            $setup .= " nama_ayah = :nama_ayah,";
        }
        if(strlen($this->nama_ibu)>0){
            $setup .= " nama_ibu = :nama_ibu,";
        }
        if(strlen($this->pekerjaan_ayah)>0){
            $setup .= " pekerjaan_ayah = :pekerjaan_ayah,";
        }
        if(strlen($this->pekerjaan_ibu)>0){
            $setup .= " pekerjaan_ibu = :pekerjaan_ibu,";
        }
        if(strlen($this->alamat_ortu)>0){
            $setup .= " alamat_ortu = :alamat_ortu, ";
        }
        $query = "UPDATE 
                    " . $this->table_name ." 
                SET 
                    nama = :nama,
                $setup
                    tgl_lahir = :tgl_lahir
                WHERE 
                    nisn = :nisn
                ";
        
        $stmt = $this->conn->prepare($query);

        $this->nisn=htmlspecialchars(strip_tags($this->nisn));
        $this->nama=htmlspecialchars(strip_tags($this->nama));
        $this->tgl_lahir=htmlspecialchars(strip_tags($this->tgl_lahir));
        $this->tpt_lahir=htmlspecialchars(strip_tags($this->tpt_lahir));
        $this->agama=htmlspecialchars(strip_tags($this->agama));
        $this->alamat=htmlspecialchars(strip_tags($this->alamat));
        $this->nama_ayah=htmlspecialchars(strip_tags($this->nama_ayah));
        $this->nama_ibu=htmlspecialchars(strip_tags($this->nama_ibu));
        $this->pekerjaan_ayah=htmlspecialchars(strip_tags($this->pekerjaan_ayah));
        $this->pekerjaan_ibu=htmlspecialchars(strip_tags($this->pekerjaan_ibu));
        $this->alamat_ortu=htmlspecialchars(strip_tags($this->alamat_ortu));

        $stmt->bindParam(":nisn", $this->nisn);
        $stmt->bindParam(":nama", $this->nama);
        $stmt->bindParam(":tgl_lahir", $this->tgl_lahir);
        if(
            strlen($this->tpt_lahir)>0 ||
            strlen($this->agama)>0 ||
            strlen($this->alamat)>0 ||
            strlen($this->nama_ayah)>0 ||
            strlen($this->nama_ibu)>0 ||
            strlen($this->pekerjaan_ayah)>0 ||
            strlen($this->pekerjaan_ibu)>0 ||
            strlen($this->alamat_ortu)>0
        ){
            $stmt->bindParam(":tpt_lahir", $this->tpt_lahir);
            $stmt->bindParam(":agama", $this->agama);
            $stmt->bindParam(":alamat", $this->alamat);
            $stmt->bindParam(":nama_ayah", $this->nama_ayah);
            $stmt->bindParam(":nama_ibu", $this->nama_ibu);
            $stmt->bindParam(":pekerjaan_ayah", $this->pekerjaan_ayah);
            $stmt->bindParam(":pekerjaan_ibu", $this->pekerjaan_ibu);
            $stmt->bindParam(":alamat_ortu", $this->alamat_ortu);
        }
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }

    }

}
?>