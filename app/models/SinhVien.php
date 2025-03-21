<?php
class SinhVien
{
    private $conn;
    private $table_name = "sinhvien";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getById($id)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE MaSV = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function add($MaSV, $HoTen, $GioiTinh, $NgaySinh, $Hinh, $MaNganh)
    {
        $query = "INSERT INTO " . $this->table_name . " (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh) 
                  VALUES (:MaSV, :HoTen, :GioiTinh, :NgaySinh, :Hinh, :MaNganh)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':MaSV', $MaSV);
        $stmt->bindParam(':HoTen', $HoTen);
        $stmt->bindParam(':GioiTinh', $GioiTinh);
        $stmt->bindParam(':NgaySinh', $NgaySinh);
        $stmt->bindParam(':Hinh', $Hinh);
        $stmt->bindParam(':MaNganh', $MaNganh);

        return $stmt->execute();
    }
}
?>
