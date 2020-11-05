<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style-details.css"/>
</head>
<body>
    <h1>THONG TIN SAN PHAM</h1>
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