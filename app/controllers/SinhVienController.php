<?php
include '../../config/database.php';
include '../../app/models/SinhVien.php';

class SinhVienController
{
    private $sinhVienModel;

    public function __construct()
    {
        $database = new Database();
        $db = $database->getConnection();
        $this->sinhVienModel = new SinhVien($db);
    }

    // Phương thức thêm sinh viên
    public function addStudent()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $MaSV = $_POST['MaSV'];
            $HoTen = $_POST['HoTen'];
            $GioiTinh = $_POST['GioiTinh'];
            $NgaySinh = $_POST['NgaySinh'];
            $MaNganh = $_POST['MaNganh'];

            // Xử lý upload ảnh
            $Hinh = "";
            if (!empty($_FILES['Hinh']['name'])) {
                $target_dir = "../../uploads/";
                if (!is_dir($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }

                $Hinh = basename($_FILES["Hinh"]["name"]);
                $target_file = $target_dir . $Hinh;
                move_uploaded_file($_FILES["Hinh"]["tmp_name"], $target_file);
            }

            // Thêm sinh viên vào database
            if ($this->sinhVienModel->add($MaSV, $HoTen, $GioiTinh, $NgaySinh, $Hinh, $MaNganh)) {
                header("Location: ../../public/student_list.php?success=1");
                exit();
            } else {
                header("Location: ../../public/student_list.php?error=1");
                exit();
            }
        } else {
            echo "Invalid request.";
        }
    }
}
?>
