<?php
    $conn = mysqli_connect('localhost', 'root', '', 'qlbansua');
    mysqli_set_charset($conn, 'UTF8');
    
    $rowsPerPage=3; //số mẩu tin trên mỗi trang, giả sử là 10
    if (!isset($_GET['page']))
    { $_GET['page'] = 1;
    }
    //vị trí của mẩu tin đầu tiên trên mỗi trang
    $offset =($_GET['page']-1)*$rowsPerPage;
    //lấy $rowsPerPagemẩu tin, bắt đầu từ vị trí $offset
    $result = mysqli_query($conn, 'SELECT  ten_sua, Trong_luong,
    Don_gia FROM sua LIMIT '. $offset . ', ' .$rowsPerPage);

    // $sql="select Ma_sua,ten_sua,Trong_luong,Don_gia from sua";
    // $result = mysqli_query($conn, $sql);
    echo "<p align='center'><font size='5'> THÔNG TIN CÁC SẢN PHẨM</font></P>";
    echo "<table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='border-
    collapse:collapse'>";
    echo '<tr>
    <th width="200"></th>
    <th width="250"> </th>
    </tr>';
    if(mysqli_num_rows($result)<>0)
    { $stt=1;
    while($rows=mysqli_fetch_array($result))
    {   echo "<tr>"; 
        echo "<td> </td>";
        echo "<td>$rows[ten_sua] $rows[Ten_hang_sua] $rows[Trong_luong] $rows[Don_gia]</td>"; 
        echo "</tr>";
        $stt+=1;
    }//while
}
echo"</table>";
$re = mysqli_query($conn, 'select * from sua');
//tổng số mẩu tin cần hiển thị
$numRows = mysqli_num_rows($re);
//tổng số trang
$maxPage = floor($numRows/$rowsPerPage) + 1;
?>
<div style="text-align: center;">
    <?php
        //gắn thêm nút Back
        if ($_GET['page'] > 1)
        echo "<a href=" .$_SERVER['PHP_SELF']."?page="
        .($_GET['page']-1)."> << </a> ";


        //tạo link tương ứng tới các trang
        for ($i=1 ; $i<=$maxPage ; $i++)
        { if ($i == $_GET['page'])
        { echo '<b >   '.$i.'</b> '; //trang hiện tại sẽ được bôi đậm
        }
        else
        echo "<a href=" .$_SERVER['PHP_SELF']. "?page="
        .$i.">".$i."</a> ";
        }
        //gắn thêm nút Next
        if ($_GET['page'] < $maxPage)
        echo "<a href=". $_SERVER['PHP_SELF']."?page="
        .($_GET['page']+1).">>></a>";
    ?>
</div>


