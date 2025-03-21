<?php include '../shares/header.php';
include '../../config/database.php'; 
include '../../models/HocPhan.php';
// Khởi tạo kết nối và model HocPhan
$database = new Database();
$db = $database->getConnection();
$hocPhan= new HocPhan($db);
$danhSachHocPhan = $hocPhan->getAll();
?>
 <div class="container mt-4">
        <h2 class="text-center">DANH SÁCH HỌC PHẦN</h2>
        <table class="table table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>Mã Học Phần</th>
                    <th>Tên Học Phần</th>
                    <th>Số Tín Chỉ</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($danhSachHocPhan as $hp) : ?>
                    <tr>
                        <td><?= htmlspecialchars($hp->MaHP) ?></td>
                        <td><?= htmlspecialchars($hp->TenHP) ?></td>
                        <td><?= htmlspecialchars($hp->SoTinChi) ?></td>
                        <td><button class="btn btn-success">Đăng Ký</button></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>