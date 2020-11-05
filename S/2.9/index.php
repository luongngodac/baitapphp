<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" type="text/css" href="style-details.css" />
</head>

<body>
    <?php 
        if (isset($_POST['searchText'])) {
            $searchText = $_POST['searchText'];
        } else {
            $searchText = "";
        }
    
    ?>
    <h1>THONG TIN SUA</h1>
    <div class="searchBox">
        <form action="" method="POST">
            <label for="searchText">Tên sữa
                <input type="text" name="searchText" value="<?php echo $searchText?>"/>
                <button name="search">Search</button>
            </label>
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