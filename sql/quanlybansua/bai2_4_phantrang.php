<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'qlbansua');
    mysqli_set_charset($conn, 'UTF8');

    $rowsPerPage = 5; //số mẩu tin trên mỗi trang, giả sử là 10
    if (!isset($_GET['page'])) {
        $_GET['page'] = 1;
    }
    //vị trí của mẩu tin đầu tiên trên mỗi trang
    $offset = ($_GET['page'] - 1) * $rowsPerPage;

    $sql = 'SELECT Ten_sua, Ten_hang_sua, Ten_loai, Trong_luong, Don_gia FROM sua, hang_sua, loai_sua WHERE sua.Ma_hang_sua = hang_sua.Ma_hang_sua AND sua.Ma_loai_sua = loai_sua.Ma_loai_sua LIMIT ' . $offset . ', ' . $rowsPerPage;
    $result = mysqli_query($conn, $sql);
    echo "<p align='center'><font size='5'><b style='color: red;'> THÔNG TIN SỮA</b></font></p>";
    echo "<table align='center' width='80%' border='1' cellpadding='2' cellspacing='2' style='bordercollapse:collapse'>";
    echo
        '<tr style="color: red;">
            <th width="20">STT</th>
            <th width="200">Tên sữa</th>
            <th width="100">Hãng sữa</th>
            <th width="100">Loại sữa</th>
            <th width="100">Trọng lượng</th>
            <th width="100">Đơn giá</th>
    </tr>';
    if (mysqli_num_rows($result) <> 0) {
        $stt = 1;
        while ($rows = mysqli_fetch_array($result)) {
            $rows[4] = number_format($rows[4], 0, ',', '.');
            if ($stt % 2 != 0) {
                echo "<tr style='background-color: pink;'>";
                echo "<td>$stt</td>";
                echo "<td>$rows[0]</td>";
                echo "<td>$rows[1]</td>";
                echo "<td>$rows[2]";
                echo "<td>$rows[3] gram</td>";
                echo "<td>$rows[4] VND</td>";
                echo "</tr>";
            } else {
                echo "<tr>";
                echo "<td>$stt</td>";
                echo "<td>$rows[0]</td>";
                echo "<td>$rows[1]</td>";
                echo "<td>$rows[2]";
                echo "<td>$rows[3] gram</td>";
                echo "<td>$rows[4] VND</td>";
                echo "</tr>";
            }

            $stt += 1;
        }
    }
    include("./2_4_paging.php");
    ?>

</body>

</html>