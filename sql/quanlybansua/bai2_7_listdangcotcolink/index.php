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
    <title>List of columns with links</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
    <h1 style="color: red;">THÔNG TIN CÁC SẢN PHẨM</h1>
    <div class="wrapper">
        <?php
            include("base.php");
        ?>
    </div>
    <div class="paging">
        <?php include("paging.php");?>
    </div>
    
</body>
</html>