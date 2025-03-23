<?php 

class DanhMuc{

    public $conn;


    // Ket noi csdl 

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAll(){
        try{
            $sql = "SELECT * FROM `danh_muc_san_phams`";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();

        }
        catch(PDOException $e){
            echo 'Error'.$e->getMessage();
        }
    }
}