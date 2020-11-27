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
    <title>Detailed list with pagination</title>
    <link rel="stylesheet" type="text/css" href="style-details.css"/>
</head>
<body>
    <h1 style="color: red;">THÔNG TIN CHI TIẾT CÁC LOẠI SỮA</h1>
    <div class="wrapper">
        <?php
            include("detail.php");
        ?>
    </div>
    <div class="paging">
        <?php include("paging.php");?>
    </div>
    
</body>
</html>