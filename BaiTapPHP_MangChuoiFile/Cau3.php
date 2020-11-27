<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../Web/login.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tìm năm nhuận</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    function nam_nhuan($nam)
    {
        if (($nam % 400 == 0) || (($nam % 4 == 0) && ($nam % 100 != 0)))
            return 1;
        else
            return 0;
    }


    $year = null;
    $ketqua = null;
    $twiceyear = null;
    $ketquatwiceyear = null;
    if (isset($_POST['search'])) {
        if (isset($_POST['youngYear'])) {
            $nam = $_POST['youngYear'];
            if ($nam > 2000) {
                $ketquatwiceyear = "";
                foreach (range(2000, $nam) as $twiceyear) {
                    if (nam_nhuan($twiceyear) == 1)
                        $ketquatwiceyear = $ketquatwiceyear . $twiceyear . " ";
                }
                if ($ketquatwiceyear != "") {
                    $ketquatwiceyear = $ketquatwiceyear . " là năm nhuận";
                } else {
                    $ketquatwiceyear = "Không có năm nhuận";
                }
            }
            if ($nam < 2000)
                $ketquatwiceyear = "Lưu ý: Năm nhập vào phải từ năm 2000 trở lên! ";
            if ($nam == "")
                $ketquatwiceyear = "Bạn chưa nhập vào.";
        }
        if (isset($_POST['nonYear'])) {
            $nam = $_POST['nonYear'];
            if ($nam < 2000) {
                $ketqua = "";
                foreach (range($nam, 1999) as $year) {
                    if (nam_nhuan($year) == 1)
                        $ketqua = $ketqua . $year . " ";
                }
                if ($ketqua != "") {
                    $ketqua = $ketqua . " là năm nhuận";
                } else {
                    $ketqua = "Không có năm nhuận";
                }
            }
            if ($nam >= 2000)
                $ketqua = "Lưu ý: Năm nhập vào phải bé hơn 2000! ";
            if ($nam == "") {
                $year = "";
                $ketqua = "Bạn chưa nhập vào.";
            }
        }
    }



    ?>

    <form action="" method="post">
        <table align="center">
            <tr align="center">
                <td>
                    <h4>Năm nhập vào lớn hơn 2000</h4>
                </td>
            </tr>
            <tr align="center">
                <td>
                    <h1>TÌM NĂM NHUẬN</h1>
                </td>
            </tr>
            <tr align="center">
                <td>
                    Năm: <input type="text" name="youngYear" value="<?php echo $twiceyear; ?>">
                </td>
            </tr>
            <tr align="center">
                <td>
                    <label>
                        <p style="background: #FFFFCC">
                            <?php
                            echo $ketquatwiceyear;
                            ?>
                        </p>
                    </label>
                </td>
            </tr>
            <tr align="center">
                <td>
                    <input type="submit" name="search" value="Tìm năm nhuận">
                </td>

            </tr>
        </table>

    </form>

    <form action="" method="post">

        <table align="center">
            <td align="center">
                <h4>Năm nhập vào bé hơn năm 2000</h4>
            </td>
            <tr align="center">
                <td>
                    <h1>TÌM NĂM NHUẬN</h1>
                </td>
            </tr>
            <tr align="center">
                <td>
                    Năm: <input type="text" name="nonYear" value="<?php echo $year; ?>">
                </td>
            </tr>
            <tr align="center">
                <td>
                    <label>
                        <p style="background: #FFFFCC">
                            <?php
                            echo $ketqua;
                            ?>
                        </p>
                    </label>
                </td>
            </tr>
            <tr align="center">
                <td>
                    <input type="submit" name="search" value="Tìm năm nhuận">
                </td>

            </tr>
        </table>

    </form>

</body>

</html>