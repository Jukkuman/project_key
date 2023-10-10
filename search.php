<?php 

session_start();
require 'config.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Document</title>
</head>
<body>
<?php

// รับคำค้นหาจากผู้ใช้
$keyword = $_GET['keyword'];

// ค้นหาข้อมูลในฐานข้อมูล
$sql = "SELECT * FROM student_info WHERE firstname LIKE '%$keyword%' OR lastname LIKE '%$keyword%' OR student_id LIKE '%$keyword%' OR tel LIKE '%$keyword%'";
$result = mysqli_query($conn,$sql);

if ($result->num_rows > 0) {
    echo "<h2>ผลการค้นหาสำหรับ: '$keyword'</h2>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>{$row['firstname']} - {$row['lastname']} - {$row['student_id']} - {$row['tel']}</li>";
    }
    echo "</ul>";
} else {
    echo "<p>ไม่พบผลลัพธ์สำหรับ: '$keyword'</p>";
}

?>

<a href="home_admin.php" class="btn btn-danger float-end">BACK</a>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>

