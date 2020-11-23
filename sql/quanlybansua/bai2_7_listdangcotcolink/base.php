<?php
     $connection = mysqli_connect('localhost', 'root', '', 'qlbansua');
     mysqli_set_charset($connection, 'UTF8');
     $rowsPerPage = 10; //số mẩu tin trên mỗi trang, giả sử là 10
    if (!isset($_GET['page']))
    { 
        $_GET['page'] = 1;
    }
    //vị trí của mẩu tin đầu tiên trên mỗi trang
    $offset =($_GET['page']-1)*$rowsPerPage;

    //$sql='SELECT Ten_sua, Ten_hang_sua, Ten_loai, Trong_luong, Don_gia FROM sua, hang_sua, loai_sua WHERE sua.Ma_hang_sua = hang_sua.Ma_hang_sua AND sua.Ma_loai_sua = loai_sua.Ma_loai_sua LIMIT '.$offset. ', '.$rowsPerPage;
     $result = mysqli_query($connection, "SELECT Ten_sua, Trong_luong, Don_gia, Hinh, Ma_sua FROM sua LIMIT $offset, $rowsPerPage");

        while($rows = mysqli_fetch_array($result)){
            echo "
            <div class='container'>
                <div class='items'>
                    <a href='detail.php?id=$rows[4]'>
                        <h3>$rows[0]</h3>
                    </a>
                    <p>$rows[1]g - $rows[2] VND - $rows[4]</p>
                    <img src='../Hinh_sua/$rows[3]' alt=''>
                </div>
            </div>";
    }
?>