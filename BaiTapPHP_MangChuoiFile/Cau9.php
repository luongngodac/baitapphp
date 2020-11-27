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
	<title>Mang tìm kiếm</title>
	<link rel="stylesheet" href="">
	<style>
		body{
			background-color: white;
		}
		#tr1{
            background-color:  #ffcccc;
		}
		#ip2{
			background: burlywood;
			width: 140px;
		}
		#ip1{
			background: white;
			width: 350px;
		}
		#ip3{
			width: 400px;
			background-color: #ff6666;
		}
		
	</style>

</head>
<body>
	<?php
		//lay gia tri day so (mang A, B tren form thong qua bien $POST)
		$mangA = null;
		$mangB = null;
		if (isset($_POST['mangA'])){
			$mangA = trim($_POST['mangA']);
			$mangA = explode(",", $mangA);
		}

		if(isset($_POST['mangB'])){
			$mangB = trim($_POST['mangB']);
			$mangB = explode(",", $mangB);
		}
		$demA = count(($mangA));
		$demB = count(($mangB));
		$mangC = null;
		$mangC = array_merge($mangA, $mangB);
		sort($mangC);       
		$mangtangC = implode(", ", $mangC);
		rsort($mangC);
		$manggiamC = implode(", ", $mangC);
        $mangC = implode(", ", $mangC);
	?>
	
	<form action="Cau9.php" method="post">
		<table align="center">
			<tr >
				<td colspan="2" style="color: white; background-color: red; text-align:center">
					<p style="font-family: fantasy">ĐẾM PHẦN TỬ, GHÉP MẢNG VÀ SẮP XẾP</p>
				</td>

			</tr>
			<tr id="tr1">
				<td>
					Mảng A: 
				</td>
				<td><input id="ip1" type="text" name="mangA"  ></td>
			</tr>
			<tr id="tr1">
				<td id="td1">
					Mảng B: 
				</td>
				<td><input id="ip1" type="text" name="mangB"></td>
			</tr>
			<tr id="tr1">
				<td>
				</td>
				<td>
					<input style="background-color: yellow;" type="submit" value="Thực hiện">
				</td>
			</tr>
			<tr>
				<td>
					Số phần tử mảng A: 
				</td>
				<td><input id="ip2" type="text" name="demA" disabled="disabled" value="<?php echo $demA;?>"></td>
			</tr>
			<tr>
				<td>
					Số phần tử mảng B: 
				</td>
				<td>
					<input id="ip2" type="text" name="demB" disabled="disabled" value="<?php echo $demB;?>">
				</td>
			</tr>
			<tr>
				<td>
					Mảng C: 
				</td>
				<td><input id="ip3" type="text" name="mangC"disabled="disabled" value="<?php echo $mangC;?>"></td>
			</tr>
			<tr>
				<td>
					Mảng C tăng dần: 
				</td>
				<td><input id="ip3" type="text" name="mangtangC" disabled="disabled" value="<?php echo $mangtangC;?>"></td>
			</tr>
			<tr>
				<td>
					Mảng C giảm dần: 
				</td>
				<td><input id="ip3" type="text" name="manggiamC"disabled="disabled" value="<?php echo $manggiamC;?>"></td>
			</tr>
			<tr>
				<td colspan="2" style="text-align: center;">
                    <p>(<span style="color:red"><b>Ghi chú</b></span>: Các phần từ trong mãng sẽ có cách nhau bằng dấu ",")</p>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>