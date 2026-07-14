<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO user (email, password) VALUES ('$email', '$password')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('تم إنشاء الحساب بنجاح!'); window.location.href='login.php';</script>";
    } else {
        echo "<script>alert('خطأ!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>إنشاء حساب</title>
</head>
<body style="font-family: sans-serif; text-align: center; padding-top: 50px; background-color: #f4f4f9;">

    <h2>إنشاء حساب جديد</h2>
    <form method="POST" style="background: #fff; display: inline-block; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <input type="email" name="email" placeholder="البريد الإلكتروني" required style="padding: 10px; margin-bottom: 10px; width: 250px;"><br>
        <input type="password" name="password" placeholder="كلمة المرور" required style="padding: 10px; margin-bottom: 10px; width: 250px;"><br>
        <button type="submit" style="padding: 10px 20px; background-color: #6a1b9a; color: white; border: none; cursor: pointer;">تسجيل</button>
    </form>
    <br><br>
    <a href="login.php">لديك حساب؟ تسجيل دخول</a>

</body>
</html>