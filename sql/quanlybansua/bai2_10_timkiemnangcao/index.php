<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced search</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" type="text/css" href="style-details.css" />
</head>

<body>
    <?php 
        if (isset($_POST['searchText']) ||
        isset($_POST['type']) ||
        isset($_POST['vendor'])
        ) {
            $searchText = $_POST['searchText'];
            $type = $_POST['type'];
            $vendor = $_POST['vendor'];
        } else {
            $searchText = "";
            $type = "";
            $vendor = "";
        }
    
    ?>
    <h1 style="color: red;">TÌM KIẾM THÔNG TIN SỮA</h1>
    <div class="searchBox">
        <form action="" method="POST">
            <label for="type">Loại sữa
                <input type="text" name="type" value="<?php echo $type?>">
            </label>
            <label for="vendor">Hãng sữa
                <input type="text" name="vendor" value="<?php echo $vendor?>"> 
            </label>
            <label for="searchText">Tên sữa
                <input type="text" name="searchText" value="<?php echo $searchText?>"/>
            </label>
            <button type="submit" name="search">Search</button>
        </form>
    </div>
    <div class="wrapper">
        <?php
        if($searchText != NULL){
            $rowsPerPage = 2;
            if (!isset($_GET['page'])) {
                $_GET['page'] = 1;
            }
            $offset = ($_GET['page'] - 1) * $rowsPerPage;
            include("detail.php");
        }else{
            include("base.php");
            echo '<div class="paging">';
                    include("paging.php");
            echo '</div>';
    
        }
        ?>
    </div>

</body>

</html>