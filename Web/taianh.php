
    <?php
    $connection = mysqli_connect('localhost', 'root', '', 'qlbansua');
    mysqli_set_charset($connection, 'UTF8');
    $rowsPerPage = 2; //số mẩu tin trên mỗi trang, giả sử là 10
    if (!isset($_GET['page'])) {
        $_GET['page'] = 1;
    }
    //vị trí của mẩu tin đầu tiên trên mỗi trang
    $offset = ($_GET['page'] - 1) * $rowsPerPage;

    $result = mysqli_query($connection, "SELECT Ma_khach_hang, Ten_khach_hang, Phai, Dia_chi, Dien_thoai, Email, hinh_anh FROM khach_hang LIMIT $offset, $rowsPerPage");
    while ($rows = mysqli_fetch_array($result)) {
        $rows[5] = number_format($rows[6], 0, ',', ' ');
        echo "
                        <h1>$rows[3] - About</h1>
                        <div class='detail'>
                            <div class='images'>
                                <img src = '../Hinh_sua/$rows[2]' alt=''>
                            </div>
                            
                            <div class='contents'>
                                <p><b>Mã khách hàng:</b></p>
                                <p>$rows[0]</p>
                                <p><b>Tên khách hàng:</b></p>
                                <p>$rows[1]</p>
                                <p><b>Phái:</b></p>
                                <p>$rows[2]</p>
                                <p><b>Địa chỉ:</b></p>
                                <p>$rows[3]</p>
                                <p><b>Điện thoại</b></p>
                                <p>$rows[4]</p>
                                <span> <b>Email: </b> $rows[5] gr - <b>Hình ảnh: </b>$rows[6] </span><br>
                                <p></p>
                            </div>
                            
                        </div>
                        
                    ";
    }
?>

