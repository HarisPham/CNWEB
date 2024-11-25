<?php
session_start();

// Kiểm tra nếu dữ liệu sản phẩm chưa tồn tại trong session
if (!isset($_SESSION['products'])) {
    // Nếu chưa có, tạo dữ liệu mẫu
    $_SESSION['products'] = [
        ["stt" => 1, "name" => "Sản phẩm 1", "price" => "1000 VND"],
        ["stt" => 2, "name" => "Sản phẩm 2", "price" => "2000 VND"],
        ["stt" => 3, "name" => "Sản phẩm 3", "price" => "3000 VND"],
    ];
}

// Xử lý khi người dùng nhấn nút "Thêm mới"
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addProduct'])) {
    // Kiểm tra và lấy dữ liệu từ form
    if (!empty($_POST['name']) && !empty($_POST['price'])) {
        $newProduct = [
            'stt' => count($_SESSION['products']) + 1, // Tự động tăng STT
            'name' => htmlspecialchars($_POST['name']),
            'price' => htmlspecialchars($_POST['price'])
        ];

        // Thêm sản phẩm mới vào session
        $_SESSION['products'][] = $newProduct;
        header('Location: index.php');
        exit();
    }
}

// Xử lý khi người dùng nhấn nút "Xóa"
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $sttToDelete = $_POST['delete'];

    // Tìm sản phẩm có STT tương ứng và xóa
    foreach ($_SESSION['products'] as $index => $product) {
        if ($product['stt'] == $sttToDelete) {
            unset($_SESSION['products'][$index]);
            $_SESSION['products'] = array_values($_SESSION['products']); // Reindex array
            $_SESSION['message'] = "Sản phẩm với STT $sttToDelete đã được xóa.";
            header('Location: index.php');
            exit();
        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
</head>
<body>
<div class="product-management">
    <form action="addProduct.php" method="POST">
        <button class="add-btn" type="submit" name="addProduct">Thêm mới</button>
    </form>
    <table>
        <thead>
        <tr>
            <th>STT</th>
            <th>Sản phẩm</th>
            <th>Giá thành</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($_SESSION['products'] as $product): ?>
            <tr>
                <td><?= htmlspecialchars($product['stt']); ?></td>
                <td><?= htmlspecialchars($product['name']); ?></td>
                <td><?= htmlspecialchars($product['price']); ?></td>
                <td>
                    <form action="editProduct.php" method="GET">
                        <input type="hidden" name="stt" value="<?= $product['stt']; ?>">
                        <button type="submit" class="edit">🖊️</button>
                    </form>
                </td>

                <td><button class="delete" onclick="openModal(<?= $product['stt']; ?>)">🗑️</button></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div id="ModDelete" class="ModDelete">
    <div class="modal-content">
        <span class="close" onclick="closeModDelete()">&times;</span>
        <p>Bạn chắc chắn muốn xóa sản phẩm này?</p>
        <form action="index.php" method="POST">
            <input type="hidden" id="sttToDelete" name="delete">
            <button type="submit" id="btnModDel">Xóa</button>
            <button type="button" id="btnModCancel" onclick="closeModDelete()">Hủy</button>
        </form>
    </div>
</div>
</body>
</html>
<script>
    // Mở modal xác nhận
    function openModal(stt) {
        document.getElementById('sttToDelete').value = stt;
        document.getElementById('ModDelete').style.display = "block";
    }

    // Đóng modal
    function closeModDelete() {
        document.getElementById('ModDelete').style.display = "none";
    }

    // Đóng modal nếu người dùng nhấn ngoài modal
    window.onclick = function(event) {
        if (event.target === document.getElementById('ModDelete')) {
            closeModDelete();
        }
    }
</script>

