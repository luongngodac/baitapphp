<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style-details.css"/>
</head>
<body>
    <?php
     $connection = mysqli_connect('localhost', 'root', '', 'qlbansua');
     mysqli_set_charset($connection, 'UTF8');
     $var = $_GET['id'];
     $result = mysqli_query($connection, "SELECT TP_Dinh_Duong, Loi_ich, Hinh, Ten_sua, Trong_luong, Don_gia FROM sua WHERE Ma_sua = '$var'");
        while($rows = mysqli_fetch_array($result)){
            $rows[5] = number_format($rows[5],0,',',' ');
            echo "
                <h1 style='color:red'>$rows[3] - About</h1>
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
                        <button onclick='goBack()'>Quay về</button>
                    </div>
                    
                </div>
                
            ";
    }    
        ?>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
</body>
</html>

