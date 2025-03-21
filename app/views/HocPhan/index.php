<?php include '../shares/header.php';

$hocPhan = new HocPhan($conn);
$danhSachHocPhan = $hocPhan->getAll();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Học Phần</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
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
</body>
</html>
