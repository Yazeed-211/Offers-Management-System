<?php
include 'connection.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // فحص البيانات في قاعدة البيانات
    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['email'] = $email;
        echo "<script>alert('تم تسجيل الدخول بنجاح!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('خطأ: الإيميل أو كلمة المرور غير صحيحة!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تسجيل الدخول</title>
</head>
<body style="font-family: sans-serif; text-align: center; padding-top: 50px; background-color: #f4f4f9;">

    <h2>تسجيل الدخول</h2>
    <form method="POST" style="background: #fff; display: inline-block; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <input type="email" name="email" placeholder="البريد الإلكتروني" required style="padding: 10px; margin-bottom: 10px; width: 250px;"><br>
        <input type="password" name="password" placeholder="كلمة المرور" required style="padding: 10px; margin-bottom: 10px; width: 250px;"><br>
        <button type="submit" style="padding: 10px 20px; background-color: #6a1b9a; color: white; border: none; cursor: pointer;">دخول</button>
    </form>

    <p>ليس لديك حساب؟ <a href="register.php">أنشئ حساباً الآن</a></p>

    <br><br>
    <a href="index.php">العودة للرئيسية</a>
</body>
</html>