<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Tính tiền Karaoke</title>
        <style>
            form 
            {
                background-color: aqua;
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
            if(isset($_POST['giobatdau']))
                $giobatdau = trim($_POST['giobatdau']); 
            else $giobatdau="";

            if(isset($_POST['gioketthuc']))
                $gioketthuc=trim($_POST['gioketthuc']); 
            else $gioketthuc="";

            if(isset($_POST['tinh']))
            {
                if(is_numeric($giobatdau) && (is_numeric($gioketthuc)))
                {
                    if(($gioketthuc >24) || ($gioketthuc <10) || ($giobatdau >24) || ($giobatdau < 10) )
                    {
                        echo "<font color='red'>Vui lòng nhập lại số giờ đúng quy định! </font>"; 
                        $tienthanhtoan="";
                    }
                    if (($gioketthuc > 17) && ($gioketthuc<=24 ) && ($giobatdau >= 10) && ($giobatdau <24))  
                        $tienthanhtoan = ($gioketthuc-17) * 45000 + (17 - $giobatdau) * 20000;
                    if(($gioketthuc > 10) && ($gioketthuc <= 17) && ($giobatdau >= 10) && ($giobatdau <24))
                        $tienthanhtoan = ($gioketthuc - $giobatdau) * 20000;
                    if($gioketthuc < $giobatdau)
                    {
                        echo "<font color='red'>Giờ kết thúc phải lớn hơn giờ bắt đầu! </font>"; 
                        $tienthanhtoan="";
                    }  
                }
            }
        ?>
        <form align='center' action="" method="post">
            <table border="0">
                <tr bgcolor="cyan">
                <th colspan="2" align="center"><h3><font color="blue">TÍNH TIỀN KARAOKE</font></h3></th>
                </tr>

                <tr><td>Giờ bắt đầu:</td>
                <td><input type="text" name="giobatdau" value="<?php  echo $giobatdau;?> "/>(h)</td>
                </tr>

                <tr><td>Giờ kết thúc:</td>
                <td><input type="text" name="gioketthuc"  value="<?php  echo $gioketthuc;?> "/>(h)</td>
                </tr>

                <tr><td>Tiền thanh toán:</td>
                <td><input type="text" name="tienthanhtoan" disabled="disabled" value="<?php  echo $tienthanhtoan;?>"/>(VNĐ)</td>
                </tr>
                
                <tr>
                <td colspan="2" align="center"><input type="submit" value="Tính tiền" name="tinh" /></td>
                </tr>
            </table>
        </form>
    </body>
</html>