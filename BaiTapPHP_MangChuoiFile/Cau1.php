<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../Web/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <?php
    if (isset($_POST["sotunhien"])) {
        $n = $_POST["sotunhien"];
    } else {
        $n = 0;
    }
    $array = [];

    for ($i = 0; $i < $n; $i++) {
        $array[$i] = rand(-100, 200);
    }

    function Number($array)
    {
        $sochan = 0;
        $nhohon100 = 0;
        $tongsoam = 0;
        $giatri0 = "";
        foreach ($array as $key => $value) {
            if ($value % 2 == 0) {
                $sochan++;
            }
            if ($value < 100) {
                $nhohon100++;
            }
            if ($value < 0) {
                $tongsoam += $value;
            }
            if ($value = 0) {
                $giatri0 == $key;
            }
		}
		
		echo "\n";
        echo "a) Hiển thị mảng phát sinh có độ dài n( n là số phần tử của mảng): \n";
        foreach($array as $value){
            echo " ".$value;
        }
        echo "\n";
        echo "b) Thành phần có giá trị chẵn:  ", $sochan, "\n";
        echo "c) Bao nhiêu thành phần trong mảng nhỏ hơn 100: ", $nhohon100, "\n";
        echo "d) Tính tổng các số âm: ", $tongsoam, "\n";
        echo "e) In ra vị trí của các thành phần trong mảng giá trị có số bằng 0: ", $giatri0, "\n";
		echo "f) Sắp xếp lại mảng tăng dần: \n";
		sort($array);
		foreach($array as $value){
            echo " ".$value;
        }
    }

    ?>
    <div class="container">
        <form action="" method="POST">
            <label for="sotunhien">Nhập vào số tự nhiên n</label>
            <input type="text" name="sotunhien">
            <button>Submit</button>
        </form>
        <textarea cols="60" rows="20">
            <?php
            Number($array);
            ?>
        </textarea>
    </div>

</body>

</html>