<?php
session_start();

if (isset($_GET['stt'])) {
    $sttToEdit = $_GET['stt'];

    // Tìm sản phẩm cần sửa dựa vào STT
    $productToEdit = null;
    foreach ($_SESSION['products'] as &$product) {
        if ($product['stt'] == $sttToEdit) {
            $productToEdit = $product;
            break;
        }
    }

    // Xử lý khi người dùng nhấn nút "Lưu"
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['saveProduct'])) {
        if (!empty($_POST['name']) && !empty($_POST['price'])) {
            // Cập nhật thông tin sản phẩm
            $productToEdit['name'] = htmlspecialchars($_POST['name']);
            $productToEdit['price'] = htmlspecialchars($_POST['price']);
            $_SESSION['products'] = array_map(function($product) use ($productToEdit) {
                return $product['stt'] == $productToEdit['stt'] ? $productToEdit : $product;
            }, $_SESSION['products']);
            header('Location: index.php');
            exit();
        }
    }
} else {
    echo "Không tìm thấy sản phẩm cần sửa!";
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php if ($productToEdit): ?>
    <form action="editProduct.php?stt=<?= $productToEdit['stt']; ?>" class="editForm" method="POST">
        <h1>SỬA SẢN PHẨM</h1>
        <label for="name">Tên sản phẩm:
           <input type="text" id="name" name="name" value="<?= htmlspecialchars($productToEdit['name']); ?>" required><br><br>
        </label>
        <label for="price">Giá:
           <input type="text" id="price" name="price" value="<?= htmlspecialchars($productToEdit['price']); ?>" required><br><br>
        </label>
        <button type="submit" name="saveProduct">Lưu</button>
        <a href="index.php">Hủy</a>
    </form>
<?php else: ?>
    <p>Sản phẩm không tồn tại.</p>
<?php endif; ?>

</body>
</html>

