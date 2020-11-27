<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../../../Web/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Simple list</title>
</head>
<body>
    <div class="wrapper">
        <h1 style="color: red;">THÔNG TIN CÁC SẢN PHẨM</h1>
        <?php
            include("main.php");
        ?>
    </div>
</body>
</html>