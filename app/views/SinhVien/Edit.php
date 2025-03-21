<?php include '../shares/header.php';


$database = new Database();
$db = $database->getConnection();
$sinhVienModel = new SinhVien($db);

if (!isset($_GET['id'])) {
    die("Thiếu mã sinh viên!");
}

$maSV = $_GET['id'];
$sinhVien = $sinhVienModel->getById($maSV);
if (!$sinhVien) {
    die("Không tìm thấy sinh viên!");
}
?>
<div class="container mx-auto mt-8 p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-3xl font-bold mb-4">CHỈNH SỬA SINH VIÊN</h1>
    <p class="text-gray-600 mb-6">Cập nhật thông tin sinh viên</p>

    <?php
    if (isset($_GET['error'])) {
        echo '<p class="text-red-500">' . htmlspecialchars($_GET['error']) . '</p>';
    }
    if (isset($_GET['success'])) {
        echo '<p class="text-green-500">Cập nhật thành công!</p>';
    }
    ?>

<form action="Edit.php?id=<?= htmlspecialchars($sinhVien['MaSV']) ?>" method="POST" enctype="multipart/form-data">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 font-bold">MaSV</label>
                <input type="text" name="MaSV" value="<?= htmlspecialchars($sinhVien->MaSV) ?>" readonly class="w-full border px-4 py-2 rounded-md bg-gray-200">
            </div>
            <div>
                <label class="block text-gray-700 font-bold">HoTen</label>
                <input type="text" name="HoTen" value="<?= htmlspecialchars($sinhVien->HoTen) ?>" required class="w-full border px-4 py-2 rounded-md focus:ring focus:ring-blue-300">
            </div>
            <div>
                <label class="block text-gray-700 font-bold">GioiTinh</label>
                <select name="GioiTinh" required class="w-full border px-4 py-2 rounded-md focus:ring focus:ring-blue-300">
                    <option value="Nam" <?= $sinhVien->GioiTinh == "Nam" ? "selected" : "" ?>>Nam</option>
                    <option value="Nữ" <?= $sinhVien->GioiTinh == "Nữ" ? "selected" : "" ?>>Nữ</option>
                </select>
            </div>
            <div>
                <label class="block text-gray-700 font-bold">NgaySinh</label>
                <input type="date" name="NgaySinh" value="<?= htmlspecialchars($sinhVien->NgaySinh) ?>" required class="w-full border px-4 py-2 rounded-md focus:ring focus:ring-blue-300">
            </div>
            <div>
                <label class="block text-gray-700 font-bold">Hinh</label>
                <input type="file" name="Hinh" accept="image/*" class="w-full border px-4 py-2 rounded-md focus:ring focus:ring-blue-300">
                <img src="../../uploads/<?= htmlspecialchars($sinhVien->Hinh) ?>" alt="Ảnh sinh viên" class="h-20 w-20 mt-2 rounded-md object-cover">
            </div>
            <div>
                <label class="block text-gray-700 font-bold">MaNganh</label>
                <input type="text" name="MaNganh" value="<?= htmlspecialchars($sinhVien->MaNganh) ?>" required class="w-full border px-4 py-2 rounded-md focus:ring focus:ring-blue-300">
            </div>
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600">Update</button>
            <a href="../../../public/Index.php" class="text-blue-500 ml-4">Back to List</a>
        </div>
    </form>
</div>
<?php include '../shares/footer.php';
 ?>
