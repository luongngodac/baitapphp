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
    <title>Simple Search</title>
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
    <h1 style="color: red;">TÌM KIẾM THÔNG TIN SỮA</h1>
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