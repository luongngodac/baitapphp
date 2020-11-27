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
	<title>Tổng dãy số</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php
		$tong = null;
		$thongbao = "";
		if(isset($_POST['DaySo']))
		{
			$DaySo = $_POST['DaySo'];
			$DaySo = trim($DaySo);
			if(($DaySo == "") || (empty($DaySo)) )
			{
				$thongbao = "Vui lòng nhập vào dãy số.";
			}
			else
			{
				$array = explode(",", $DaySo); // lay mang boi phan cach dau "," o trong day so nhap vao. explode(separator,string,limit)
				$n = count($array);
				for($i = 0; $i<$n; $i++)
				{
					$tong = $tong + $array[$i];
				}
				$fb = fopen("data.txt", 'w+'); // xuat ra  file tu bien fb
				fwrite($fb, $DaySo);
				fclose($fb);
			}
		}
	?>

	
	<form align="center"action="" method="post" style="width: auto; ">
		
		<table align="center" style="border: 1px solid black; ">
			<tr style=" background-color: blue; color: white; " align="center">
				<td style="width: 500px;" colspan="2"><h1>NHẬP VÀ TÍNH TRÊN DÃY SỐ</h1></td>
			</tr>
			<tr >
				<td>Nhập dãy số:</td>
				<td >
					 <input type="text" name ="DaySo" 
					value="<?php echo $DaySo?>"> <span style="color: red;" >(*)</span>	
				</td>
			</tr>
			<tr >
				<td></td>
				<td><input type="submit" value="Tổng dãy số" name="tinh"></td>
			</tr>
			<tr >
				<td>Tổng dãy số:</td>
				<td>
					<input type="text" name="tong" disabled="disabled" style="background: aqua;" 
					value="<?php echo $tong;?>">
				</td>
				
			</tr>
			<tr >
			<td style="color: red;" colspan="2" align="center">(*) Các số được nhập cách nhau bằng dấu ","</td>
			</tr>
			<tr>
				<td style="color: red;"><?php echo $thongbao;?></td>
			</tr>

		</table>
	</form>
	
</body>
</html>