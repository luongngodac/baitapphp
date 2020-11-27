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
    if (isset($_POST["namduonglich"])) {
        $namduonglich = $_POST["namduonglich"];
    } else {
        $namduonglich = "";
    }

    $mang_can = array("Qúy", "Giáp", "Ất", "Bính", "Đinh", "Mậu", "Kỷ", "Canh", "Tân", "Nhâm");
    $mang_chi = array("Hợi", "Tý", "Sửu", "Dần", "Mão", "Thìn", "Tỵ", "Ngọ", "Mùi", "Thân", "Dậu", "Tuất");
    $mang_hinh = array(
        "hoi", "chuot", "suu", "dan", "meo", "thin",
        "ty", "ngo", "mui", "than", "dau", "tuat"
    );

    // Tinh can, chi va lay hinh anh cho nam duoc nhap. 
    
    // tinh can, chi va lay hinh anh nam duoc nhap
    if ($namduonglich) {
        
        $namduonglich = $namduonglich - 3;
        $can = $namduonglich % 10;
        $chi = $namduonglich % 12;
        $namamlich = $mang_can[$can];
        $namamlich = $namamlich." ".$mang_chi[$chi];
        $hinh = $mang_hinh[$chi];
        $hinh_anh = "<img src = '../$hinh'>";
        $namduonglich = $namduonglich + 3;
    }
    ?>

    <div class="container">
        <h2 style="text-align: center;">TÍNH NĂM ÂM LỊCH</h2>
        <div class="container">
            <form action="" method="POST">
                <div class="namduonglich">
                    <p>Năm dương lịch</p>
                    <input type="text" name="namduonglich" value="<?php echo $namduonglich ?>">
                </div>
                <div class="namamlich">
                    <button>=></button>
                </div>
                <div>
                    <p>Năm âm lịch</p>
                    <input type="text" name="namamlich" value="<?php echo $namamlich ?>" readonly>
                </div>
            </form>
        </div>
        <div class="image">
            <img src="images/<?php echo $hinh ?>.jpg">
        </div>
    </div>

</body>

</html>