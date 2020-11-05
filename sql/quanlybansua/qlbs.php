<?php
    // 1. KetnoiCSDL
    $conn= mysqli_connect('localhost', 'root', '', 'qlbansua') or die('Không thể kết nối tới database'. mysqli_connect_error());
    // 2. Chuanbi cautruyvan & 3. Thucthicautruyvan
    $sql = "SELECT * FROM Khach_hang";
    $result = mysqli_query($conn, $sql);
    // 4.Xu lydu lieu trave
    if(mysqli_num_rows($result)!=0){
        while ($row = mysqli_fetch_array($result))
        {   
            for ($i=0; $i<mysqli_num_fields($result); $i++)
            echo $row[$i] . " ";
        }
    }
        // 5. Xoaa ket qua khoi vung nho va Dong ketnoi
        mysqli_free_result($result);
        mysqli_close($conn);
?>