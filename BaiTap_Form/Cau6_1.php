<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Kết quả phép tính</title>
    <style>
        form {
            width: auto;
            height: auto;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>

<body>

    <?php

    function pheptinh($pt, $a, $b)
    {
        if ($pt == '+') {
            return $a + $b;
        } else if ($pt == '-') {
            return $a - $b;
        } else if ($pt == '*') {
            return $a * $b;
        } else if ($pt == '/') {
            if ($b != 0) {
                return $a / $b;
            } else {
                // echo 'Khong the chia cho 0';
                return -404444444444444444444444;
            }
        }
    }

    if (isset($_POST['tinhtoan']))
        $kq = trim($_POST['tinhtoan']);
    else $kq = 0;

    if (isset($_POST['sothunhat']))
        $a = trim($_POST['sothunhat']);
    else $a = 0;

    if (isset($_POST['sothuhai']))
        $b = trim($_POST['sothuhai']);
    else $b = 0;

    
    $pt = $_POST['pheptinh'];
    $kq = 0;
    switch ($pt ) {
        case ('+'):
            $kq = pheptinh($pt, $a, $b);
            $pt = "Cộng";
        break;
        case ('-'):
            $kq = pheptinh($pt, $a, $b);
            $pt = "Trừ";
        break;
        case ('*'):
            $kq = pheptinh($pt, $a, $b);
            $pt = "Nhân";
        break;
        case ('/'):
            $kq = pheptinh($pt, $a, $b);
            $pt = "Chia";
        break;
    }
    
    ?>


    <form align='center' action="" method="post">
        <table border="0">
            <tr>
                <th colspan="2" align="center">
                    <h3>
                        <font color="aqua">PHÉP TÍNH TRÊN HAI SỐ</font>
                    </h3>
                </th>
            </tr>

            <tr>
                <td style="color: red">Chọn phép tính:
                    <?php echo $pt; ?>
                </td>
            </tr>

            <tr>
                <td style="color: blue">Số 1:</td>
                <td><input type="text" name="sothunhat" value="<?php echo $a; ?> " /></td>
            </tr>

            <tr>
                <td style="color: blue">Số 2:</td>
                <td><input type="text" name="sothuhai" value="<?php echo $b; ?> " /></td>
            </tr>

            <tr>
                <td style="color: blue">Kết quả:</td>
                <td><input type="text" name="tinhtoan" value="<?php echo $kq; ?> " /></td>
            </tr>

            <tr>
                <td colspan="2" align="center">
                    <a href="javascript:window.history.back(-1);" style="color: purple;">Trở về trang trước đó</a>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>