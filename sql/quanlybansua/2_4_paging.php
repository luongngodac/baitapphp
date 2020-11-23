<?php
    // $rowsPerPage = 5; //số mẩu tin trên mỗi trang, giả sử là 10
    // if (!isset($_GET['page']))
    // { 
    //     $_GET['page'] = 1;
    // }
    // //vị trí của mẩu tin đầu tiên trên mỗi trang
    // $offset =($_GET['page']-1)*$rowsPerPage;

    // $sql='SELECT Ten_sua, Ten_hang_sua, Ten_loai, Trong_luong, Don_gia FROM sua, hang_sua, loai_sua WHERE sua.Ma_hang_sua = hang_sua.Ma_hang_sua AND sua.Ma_loai_sua = loai_sua.Ma_loai_sua LIMIT '.$offset. ', '.$rowsPerPage;


    $re = mysqli_query($conn, 'select * from sua');
    //tổng số mẩu tin cần hiển thị
    $numRows = mysqli_num_rows($re);
    //tổng số trang
    $maxPage = floor($numRows/$rowsPerPage) + 1;
    echo '<p>';
    if ($_GET['page'] > 1)
    { 
        echo "<a href=" .$_SERVER['PHP_SELF']."?page=".($_GET['page']-1)."> << </a> ";
    }else{
        echo "<< < ";
    }    //tạo link tương ứng tới các trang
    for ($i=1 ; $i<=$maxPage ; $i++)
    { 
        if ($i == $_GET['page'])
        { 
            echo '<b> '.$i.'</b> '; //trang hiện tại sẽ được bôi đậm
        }
        else
        {
            echo "<a href=" .$_SERVER['PHP_SELF']. "?page=".$i.">".$i."</a> ";
        }
        
    }
    if ($_GET['page'] < $maxPage)
    { 
        echo "<a href=". $_SERVER['PHP_SELF']."?page=".($_GET['page']+1)."> >></a>";
    }
    else{
        echo "> >>";
    }
    echo '</p>';
?>