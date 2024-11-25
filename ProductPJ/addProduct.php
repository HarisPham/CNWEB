<?php
// Khởi động session để lưu trữ dữ liệu
session_start();

// Kiểm tra nếu form được gửi đi với hành động 'add'
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add') {
    // Lấy dữ liệu từ form
    $stt = isset($_POST['stt']) ? $_POST['stt'] : '';
    $productName = isset($_POST['name']) ? $_POST['name'] : '';
    $price = isset($_POST['price']) ? $_POST['price'] : '';

    // Kiểm tra dữ liệu hợp lệ
    if (!empty($stt) && ctype_digit($stt) && !empty($productName) && !empty($price)) {
        // Nếu chưa có dữ liệu trong session, khởi tạo mảng
        if (!isset($_SESSION['products'])) {
            $_SESSION['products'] = [];
        }

        $stt = count($_SESSION['products']) + 1;
        // Thêm sản phẩm mới vào danh sách
        $_SESSION['products'][] = [
            'stt' => $stt,
            'name' => $productName,
            'price' => $price,
        ];
        // Sau khi thêm sản phẩm, chuyển hướng về trang index.php
        header('Location: index.php');
        exit();
    } else {
        echo "Dữ liệu không hợp lệ. Vui lòng kiểm tra lại.";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thêm sản phẩm</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form method="POST" action="" class="addForm">
        <h1>THÊM SẢN PHẨM</h1><hr>
        <input type="hidden" name="action" value="add">
        <label>STT:
            <input type="text" name="stt" value="<?= count($_SESSION['products']) + 1 ?>" readonly>
        </label>
        <label>Tên sản phẩm:
            <input type="text" name="name">
        </label>
        <label>Giá:
            <input type="text" name="price">
        </label>
        <div class="addButton">
           <button type="submit" name="action" value="add">Thêm</button>
        </div>
    </form>
</body>
</html>
