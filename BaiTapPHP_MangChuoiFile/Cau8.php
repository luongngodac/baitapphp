<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../Web/login.php');
}
?>
<!DOCTYPE html>
<header>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Mảng sắp xếp</title>
	<link rel="stylesheet" href="">
	<style>
		body{
			background-color: #b3cccc;
			position: center;
		}
		form{
			width: 400px;
			border: 1px solid black;
			display: flex;
			margin: 0 auto;/*Cai nay de cho no ra giua thoi*/
		}
	</style>
</header>

<body>
	<?php
		function hoan_vi(&$a, &$b)
		{
			$temp = $a;
			$a =  $b;
			$b = $temp;
		}

		function sap_tang($mang)
		{
			for ($i=0; $i <= count($mang); $i++)
				for ($j=$i; $j <= count($mang)-1; $j++)
					if($mang[$i] > $mang[$j])
						hoan_vi($mang[$i], $mang[$j]);
			return $mang;
		}

		function sap_giam($mang)
		{
			for ($i=0; $i <= count($mang); $i++)
				for ($j=$i; $j <= count($mang)-1; $j++)
					if($mang[$i] < $mang[$j])
						hoan_vi($mang[$i], $mang[$j]);
			return $mang;
		}

		$tangdan = null;
		$giamdan = null;
		if (isset($_POST['mang'])){
			$input_array = trim($_POST['mang']);
			$mang = explode(",", $input_array);
			$tangdan = sap_tang($mang);
			$tangdan = implode(",", $tangdan);
			$giamdan = sap_giam($mang);
			$giamdan = implode(",", $giamdan);
		}

	?>

	<form action="" method="post">
		<table >
			<tr align="center">
				<td colspan="2" style="background-color: #00cc99;">
					<p style="font-size: larger;">SẮP XẾP MẢNG</p>
				</td>
			</tr>
			<tr>
				<td>Nhập mảng: </td>
				<td><input type="text" name="mang" style="width: 250px;"><span style="color: red;">(*)</span></td>
			</tr>				
			<tr>
				<td></td>
				<td><button name="sapxep">Sắp xếp tăng/giảm</button></td> 
			</tr>				
			<tr>
				<td><span style="color: red;"><b>Sau khi sắp xếp:</b></span></td>
			</tr>				
			<tr>
				<td>Tăng dần</td>
				<td><input type="text" disabled name="tangdan" style="width: 250px;" value="<?php echo $tangdan;?>"/></td>
			</tr>
			<tr>
				<td>Giảm dần</td>
				<td><input type="text" disabled name="giamdan" style="width: 250px;" value="<?php echo $giamdan ?> "/></td>
			</tr>
			<tr align="center">
				<td colspan="2"><span style="color: red;">(*)</span>Các số được nhập cách nhau bằng dấu ","</td>
			</tr>
		</table>
	</form>

</body>

<footer>
</footer>
</html>