<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Tính diện tích hình chữ nhật</title>
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

if(isset($_POST['chieudai']))  

    $chieudai=trim($_POST['chieudai']); 

else $chieudai=0;

if(isset($_POST['chieurong'])) 

    $chieurong=trim($_POST['chieurong']); 

else $chieurong=0;

if(isset($_POST['tinh']))

        if (is_numeric($chieudai) && is_numeric($chieurong))  

            $dientich=$chieudai * $chieurong;

        else {

                echo "<font color='red'>Vui lòng nhập vào số! </font>"; 

                $dientich="";

            }

else $dientich=0;

?>


<form align='center' action="" method="post">

<table border="0">

    <tr bgcolor="black">

     <th colspan="2" align="center"><h3><font color="blue" >DIỆN TÍCH HÌNH CHỮ NHẬT</font></h3></th>

    </tr>

    <tr><td>Chiều dài:</td>

     <td><input type="text" name="chieudai" value="<?php  echo $chieudai;?> "/></td>

    </tr>

    <tr><td>Chiều rộng:</td>

     <td><input type="text" name="chieurong" value="<?php  echo $chieurong;?> "/></td>

    </tr>

    <tr><td>Diện tích:</td>

     <td><input type="text" name="dientich" disabled="disabled" value="<?php  echo $dientich;?> "/></td>

    </tr>

    <tr>

     <td colspan="2" align="center"><input type="submit" value="Tính" name="tinh" /></td>

    </tr>

</table>

</form>

</body>

</html>