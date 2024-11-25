<?php
$filename = "KTPM2.csv";
$students = [];

if (($handle = fopen($filename, "r")) !== FALSE) {
    $headers = fgetcsv($handle, 1000, ",", '"', "\\");

    // Kiểm tra nếu số lượng phần tử của headers có bằng số phần tử của dòng dữ liệu
    while (($data = fgetcsv($handle, 1000, ",", '"', "\\")) !== FALSE) {
        if (count($headers) === count($data)) {
            $students[] = array_combine($headers, $data);
        } else {
            // Có thể ghi lại lỗi hoặc tiếp tục mà không thêm dòng này vào
            error_log("Dòng dữ liệu không hợp lệ: " . implode(",", $data));
        }
    }

    fclose($handle);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Danh sách sinh viên</h1>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
        <tr>
            <th>Username</th>
            <th>Password</th>
            <th>Lastname</th>
            <th>Firstname</th>
            <th>City</th>
            <th>Email</th>
            <th>Course</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($students as $student): ?>
            <tr>
                <td><?= htmlspecialchars($student['username']) ?></td>
                <td><?= htmlspecialchars($student['password']) ?></td>
                <td><?= htmlspecialchars($student['lastname']) ?></td>
                <td><?= htmlspecialchars($student['firstname']) ?></td>
                <td><?= htmlspecialchars($student['city']) ?></td>
                <td><?= htmlspecialchars($student['email']) ?></td>
                <td><?= htmlspecialchars($student['course1']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
