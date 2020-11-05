<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Thanh toán tiền điện</title>
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
    if(isset($_POST['tenchuho']))  
        $tenchuho=trim($_POST['tenchuho']); 
    else $tenchuho="";

    if(isset($_POST['chisocu'])) 
        $chisocu=trim($_POST['chisocu']); 
    else $chisocu=0;

    if(isset($_POST['chisomoi']))  
        $chisomoi=trim($_POST['chisomoi']); 
    else $chisomoi=0;

    if(isset($_POST['dongia']))  
        $dongia=trim($_POST['dongia']); 
    else $dongia=0;

    if(isset($_POST['tinh']))
            if (is_numeric($chisomoi) && is_numeric($chisomoi) && is_numeric($dongia))  
        $tienthanhtoan = ($chisomoi - $chisocu) * $dongia;
            else {
                    echo "<font color='red'>Vui lòng nhập vào số! </font>"; 
                    $tienthanhtoan="";
                }
    else $tienthanhtoan=0;
    ?>


    <form align='center' action="" method="post">
        <table border="0">
            <tr bgcolor="black">
            <th colspan="2" align="center"><h3><font color="blue">THANH TOÁN TIỀN ĐIỆN</font></h3></th>
            </tr>

            <tr><td>Tên chủ hộ:</td>
            <td><input type="text" name="tenchuho" value="<?php  echo $tenchuho;?> "/></td>
            </tr>

            <tr><td>Chỉ số cũ:</td>
            <td><input type="text" name="chisocu" value="<?php  echo $chisocu;?> "/>(KW)</td>
            </tr>

            <tr><td>Chỉ số mới:</td>
            <td><input type="text" name="chisomoi" value="<?php  echo $chisomoi;?> "/>(KW)</td>
            </tr>

            <tr><td>Chỉ số đơn giá:</td>
            <td><input type="text" name="dongia" value="2000"/>(VNĐ)</td>
            </tr>

            <tr><td>Số tiền thanh toán:</td>
            <td><input type="text" name="tienthanhtoan" disabled="disabled" value="<?php  echo $tienthanhtoan;?> "/>(VNĐ)</td>
            </tr>

            <tr>
            <td colspan="2" align="center"><input type="submit" value="Tính" name="tinh" /></td>
            </tr>
        </table>
    </form>
</body>

</html>