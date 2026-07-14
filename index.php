<?php
include 'connection.php'; 
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // كود إضافة العرض مع رفع الصورة
    if (isset($_POST['title'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $org_price = $_POST['price'];
        $discount = $_POST['discount'];
        
        // التعامل مع رفع الصورة
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $image);
        
        $sql_offer = "INSERT INTO offer (title, description, org_price, discount, image) 
                      VALUES ('$title', '$description', '$org_price', '$discount', '$image')";

        if (mysqli_query($conn, $sql_offer)) {
            echo "<script>alert('تم إضافة العرض بنجاح!'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('فشل: " . mysqli_error($conn) . "');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>MyOffers</title>
</head>
<body style="font-family: sans-serif; background-color: #f4f4f9;">

<header style="background-color: #6a1b9a; color: white; padding: 20px; text-align: center;">
    <h1>MyOffers</h1>
    <nav>
        <button onclick="showSection('home')">Home</button>
        <button onclick="showSection('create_offer')">Create Offer</button>
        <button onclick="window.location.href='login.php'">Login</button>
    </nav>
</header>

<section id="home" style="padding: 20px;">
    <h2 style="text-align: center;">العروض الحالية</h2>
    <div style="display: flex; gap: 20px; flex-wrap: wrap; justify-content: center;">
        <?php
        $query = "SELECT * FROM offer";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div style='border: 1px solid #ddd; border-radius: 10px; padding: 15px; width: 220px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); background-color: #fff;'>";
                echo "<img src='uploads/" . $row['image'] . "' width='100%'><br>";
                echo "<h3 style='color: #4a148c;'>" . $row['title'] . "</h3>";
                echo "<p style='color: #555;'>" . $row['description'] . "</p>";
                echo "<p style='font-weight: bold; color: #d32f2f;'>السعر: " . $row['org_price'] . " ريال</p>";
                echo "<p style='color: #388e3c;'>الخصم: " . $row['discount'] . "%</p>";
                echo "</div>";
            }
        } else {
            echo "<p style='text-align: center;'>لا توجد عروض حالياً.</p>";
        }
        ?>
    </div>
</section>

<section id="create_offer" style="display: none; padding: 20px; text-align: center;">
    <h2>إنشاء عرض</h2>
    <form action="index.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Title" required><br><br>
        <textarea name="description" placeholder="Description" required></textarea><br><br>
        <input type="number" name="price" placeholder="Original Price" required><br><br>
        <input type="number" name="discount" placeholder="Discount" required><br><br>
        <input type="file" name="image" required><br><br>
        <button type="submit">Create Offer</button>
    </form>
</section>

<script>
function showSection(id) {
    document.getElementById('home').style.display = (id === 'home') ? 'block' : 'none';
    document.getElementById('create_offer').style.display = (id === 'create_offer') ? 'block' : 'none';
}
</script>
</body>
</html>