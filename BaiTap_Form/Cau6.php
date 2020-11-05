<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Phép tính</title>
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
    // function pheptinh($pt, $a, $b)
    // {
    //     if ($pt == '+') {
    //         return $a + $b;
    //     } else if ($pt == '-') {
    //         return $a - $b;
    //     } else if ($pt == '*') {
    //         return $a * $b;
    //     } else if ($pt == '/') {
    //         if ($b != 0) {
    //             return $a / $b;
    //         } else {
    //             echo 'Khong the chia cho 0';
    //         }
    //     }
    // }

    if (isset($_POST['sothunhat']))
        $a = trim($_POST['sothunhat']);
    else $a = "0";

    if (isset($_POST['sothuhai']))
        $b = trim($_POST['sothuhai']);
    else $b = "0";


    // if (isset($_POST['Tinh'])) {

    //     // if (isset($_POST['pheptinh'])) {
    //     //     $pt = $_POST['pheptinh'];
    //     //     $kq = 0;
    //     //     if ($pt == '+') {
    //     //         $kq = pheptinh($pt, $a, $b);
    //     //         $_POST['pheptinh'] = 'Cộng';
    //     //     } else if ($pt == '-') {
    //     //         $kq = pheptinh($pt, $a, $b);
    //     //         $_POST['pheptinh'] = 'Trừ';
    //     //     } else if ($pt == '*') {
    //     //         $kq = pheptinh($pt, $a, $b);
    //     //         $_POST['pheptinh'] = 'Nhân';
    //     //     } else if ($pt == '/') {
    //     //         $kq = pheptinh($pt, $a, $b);
    //     //         $_POST['pheptinh'] = 'Chia';
    //     //     }
    //     //     $_POST['tinhtoan'] = $kq;
            
    //     // } else
    //     //     $_POST['pheptinh'] = 'None';
    // }

    ?>

    <form align='center' action="Cau6_1.php" method="post">
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
                    <input type="radio" name="pheptinh" value="+" 
                    <?php if(isset($_POST['pheptinh'])&&($_POST['pheptinh'])=="+") echo 'checked="checked"'?>/>Cộng

                    <input type="radio" name="pheptinh" value="-" 
                    <?php if(isset($_POST['pheptinh'])&&($_POST['pheptinh'])=="-") echo 'checked="checked"'?>/>Trừ

                    <input type="radio" name="pheptinh" value="*" checked 
                    <?php if(isset($_POST['pheptinh'])&&($_POST['pheptinh'])=="*") echo 'checked="checked"'?>/>Nhân

                    <input type="radio" name="pheptinh" value="/" 
                    <?php if(isset($_POST['pheptinh'])&&($_POST['pheptinh'])=="/") echo 'checked="checked"'?>/>Chia
                </td>
            </tr>

            <tr>
                <td style="color: blue">Số thứ nhất:</td>
                <td><input type="text" name="sothunhat" value="<?php echo $a; ?> " /></td>
            </tr>

            <tr>
                <td style="color: blue">Số thứ hai:</td>
                <td><input type="text" name="sothuhai" value="<?php echo $b; ?> " /></td>
            </tr>

            <tr>
                <td colspan="2" align="center"><input type="submit" name="Tinh" value="Tính" /></a></td>
            </tr>
        </table>
    </form>
</body>

</html>