<?php
$conn = mysqli_connect("localhost:3307", "root", "", "offers");

// التحقق من نجاح الاتصال
if (!$conn) {
    die("فشل الاتصال بقاعدة البيانات: " . mysqli_connect_error());
}
?>