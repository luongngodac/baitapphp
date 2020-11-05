<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Kết quả thi đại học</title>
    <style>
        form 
        {
            background-color: #FF4136;
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
    if(isset($_POST['toan']))  
        $toan=trim($_POST['toan']); 
    else $toan="0";

    if(isset($_POST['ly']))  
        $ly=trim($_POST['ly']); //trim de xoa khoang trang.
    else $ly="0";

    if(isset($_POST['hoa'])) 
        $hoa=trim($_POST['hoa']); 
    else $hoa=0;

    if(isset($_POST['diemchuan']))  
        $diemchuan=trim($_POST['diemchuan']); 
    else $diemchuan=0;

    if(isset($_POST['tinh']))
            if (is_numeric($toan) && is_numeric($ly) && is_numeric($hoa))  
        $tongdiem = $toan + $ly + $hoa;
            else {
                    echo "<font color='red'>Error! </font>"; 
                    $tongdiem="";
                }
    else $tongdiem=0;

    if(isset($_POST['tinh']))
        if (($tongdiem < $diemchuan) || ($toan == 0) || ($ly == 0) || ($hoa == 0))
                $ketquathi = "Trượt";
        else
                $ketquathi = "Đậu";
    else $ketquathi="";
    ?>


    <form align='center' action="" method="post">
        <table border="0">
            <tr bgcolor="black">
            <th colspan="2" align="center"><h3><font color="blue">KẾT QUẢ THI ĐẠI HỌC</font></h3></th>
            </tr>

            <tr><td>Toán: </td>
            <td><input type="text" name="toan" value="<?php  echo $toan;?> "/></td>
            </tr>

            <tr><td>Lý: </td>
            <td><input type="text" name="ly" value="<?php  echo $ly;?> "/></td>
            </tr>
            
            <tr><td>Hóa</td>
            <td><input type="text" name="hoa" value="<?php  echo $hoa;?> "/></td>
            </tr>

            <tr><td>Điểm chuẩn: </td>
            <td><input type="text" name="diemchuan" value="<?php  echo $diemchuan;?> "/></td>
            </tr>

            <tr><td>Tổng điểm:</td>
            <td><input type="text" name="tongdiem" disabled="disabled" value="<?php echo $tongdiem;?>"/></td>
            </tr>

            <tr><td>Kết quả thi:</td>
            <td><input type="text" name="ketquathi" disabled="disabled" value="<?php  echo $ketquathi;?> "/></td>
            </tr>

            <tr>
            <td colspan="2" align="center"><input type="submit" value="Xem kết quả" name="tinh" /></td>
            </tr>
        </table>
        
    </form>

</body>
</html>