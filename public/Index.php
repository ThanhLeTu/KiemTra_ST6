<?php
include '../app/views/shares/header.php';
include '../app/config/database.php'; 
include '../app/models/SinhVien.php';

// Khởi tạo kết nối và model SinhVien
$database = new Database();
$db = $database->getConnection();
$sinhVienModel = new SinhVien($db);

// Lấy danh sách sinh viên
$sinhViens = $sinhVienModel->getAll();
?>

<div class="container mx-auto mt-8">
    <h1 class="text-3xl font-bold mb-4">TRANG SINH VIÊN</h1>
    <a href="../app/views/SinhVien/Create.php" class="text-blue-500 mb-4 inline-block">Add Student</a>

    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">MaSV</th>
                <th class="py-2 px-4 border-b">HoTen</th>
                <th class="py-2 px-4 border-b">GioiTinh</th>
                <th class="py-2 px-4 border-b">NgaySinh</th>
                <th class="py-2 px-4 border-b">Hinh</th>
                <th class="py-2 px-4 border-b">MaNganh</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sinhViens as $sv) : ?>
                <tr>
                    <td class="py-2 px-4 border-b"><?= htmlspecialchars($sv->MaSV) ?></td>
                    <td class="py-2 px-4 border-b">
                    <a href="Detail.php?MaSV=<?= htmlspecialchars($sv->MaSV) ?>" class="text-blue-500">
                            <?= htmlspecialchars($sv->HoTen) ?>
                        </a>
                    </td>
                    <td class="py-2 px-4 border-b"><?= htmlspecialchars($sv->GioiTinh) ?></td>
                    <td class="py-2 px-4 border-b"><?= htmlspecialchars($sv->NgaySinh) ?></td>
                    <td class="py-2 px-4 border-b">
                        <img src="../uploads/<?= htmlspecialchars($sv->Hinh) ?>" alt="Avatar" class="h-12 w-12 rounded-full object-cover">
                    </td>
                    <td class="py-2 px-4 border-b"><?= htmlspecialchars($sv->MaNganh) ?></td>
                    <td class="py-2 px-4 border-b">
                        <a href="Edit.php?MaSV=<?= htmlspecialchars($sv->MaSV) ?>" class="text-blue-500">Edit</a>
                        <a href="delete.php?MaSV=<?= htmlspecialchars($sv->MaSV) ?>" class="text-red-500">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
include '../app/views/shares/footer.php';
?>
