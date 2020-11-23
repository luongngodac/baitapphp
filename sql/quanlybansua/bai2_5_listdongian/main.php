<?php
     $connection = mysqli_connect('localhost', 'root', '', 'qlbansua');
     mysqli_set_charset($connection, 'UTF8');
     $result = mysqli_query($connection, "SELECT Ten_sua, Trong_luong, Don_gia, Hinh, Ten_hang_sua, Ten_loai FROM sua, hang_sua, loai_sua WHERE sua.Ma_hang_sua = hang_sua.Ma_hang_sua AND sua.Ma_loai_sua = loai_sua.Ma_loai_sua");

     while($rows = mysqli_fetch_array($result)){
        echo "
            <div class='contents'>
                <img src='Hinh_sua/$rows[3]' alt=''>
                <div class='details'>
                    <h3>$rows[0]</h3>
                    <p>Nhà sản xuất: $rows[4]</p>
                    <p>$rows[5] - $rows[1] - $rows[2] VND</p>
                </div>
            </div>
        ";
}
?>