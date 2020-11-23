
    <?php
    $connection = mysqli_connect('localhost', 'root', '', 'qlbansua');
    mysqli_set_charset($connection, 'UTF8');
    $result = mysqli_query($connection, "SELECT TP_Dinh_Duong, Loi_ich, Hinh, Ten_sua, Trong_luong, Don_gia FROM sua WHERE Ten_sua LIKE '%$searchText%' LIMIT $offset, $rowsPerPage");
    $num = mysqli_num_rows($result);
    echo '<h2 style = "text-align: center;">'.$num.' was found</h2>';
    while ($rows = mysqli_fetch_array($result)) {
        $rows[5] = number_format($rows[5], 0, ',', ' ');
        echo "
                        <h1>$rows[3] - About</h1>
                        <div class='detail'>
                            <div class='images'>
                                <img src = '../Hinh_sua/$rows[2]' alt=''>
                            </div>
                            
                            <div class='contents'>
                                <p><b>Thành phần dinh dưỡng:</b></p>
                                <p>$rows[0]</p>
                                <p><b>Lợi ích:</b></p>
                                <p>$rows[1]</p>
                                <span> <b>Trọng lượng: </b> $rows[4] gr - <b>Đơn giá: </b>$rows[5] VND</span><br>
                                <p></p>
                            </div>
                            
                        </div>
                        
                    ";
    }
?>

