<?php
include '../app/views/shares/header.php';
include '../app/config/database.php';
include '../app/models/SinhVien.php';

// Kiểm tra nếu có tham số MaSV trong URL
if (!isset($_GET['MaSV']) || empty($_GET['MaSV'])) {
    die("Thiếu thông tin sinh viên.");
}

// Lấy MaSV từ URL
$MaSV = $_GET['MaSV'];

// Khởi tạo kết nối và model SinhVien
$database = new Database();
$db = $database->getConnection();
$sinhVienModel = new SinhVien($db);

// Lấy thông tin sinh viên
$sinhVien = $sinhVienModel->getById($MaSV);

if (!$sinhVien) {
    die("Sinh viên không tồn tại.");
}
?>

<div class="container mx-auto mt-8 p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-3xl font-bold mb-4">Thông Tin Sinh Viên</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <img src="../uploads/<?= htmlspecialchars($sinhVien->Hinh) ?>" alt="Hình sinh viên" class="h-40 w-40 rounded-full object-cover border">
        </div>
        <div>
            <p><strong>MaSV:</strong> <?= htmlspecialchars($sinhVien->MaSV) ?></p>
            <p><strong>Họ Tên:</strong> <?= htmlspecialchars($sinhVien->HoTen) ?></p>
            <p><strong>Giới Tính:</strong> <?= htmlspecialchars($sinhVien->GioiTinh) ?></p>
            <p><strong>Ngày Sinh:</strong> <?= htmlspecialchars($sinhVien->NgaySinh) ?></p>
            <p><strong>Mã Ngành:</strong> <?= htmlspecialchars($sinhVien->MaNganh) ?></p>
        </div>
    </div>

    <div class="mt-6">
        <a href="index.php" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600">Back to List</a>
    </div>
</div>

<?php
include '../app/views/shares/footer.php';
?>
