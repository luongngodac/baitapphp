<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Mang tìm kiếm</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php
			$arrayC=null;
			$arrayCIncresing =null;
			$arrayCDecreasing =null;
			$countA =null;
			$countB = null;
		
			if(isset($_POST['arrayA']) && isset($_POST['arrayB'])){

				$a = trim($_POST['arrayA']);
				$arrayA = explode(",", $a);
				$countA = count($arrayA);

				$b = trim($_POST['arrayB']);
				$arrayB = explode(",", $b);
				$countB = count($arrayB);

				$c = array_merge($arrayA,$arrayB);
				 $arrayC = implode(",", $c);

				 sort($c);
				 $arrayCIncresing = implode(",", $c);
				  
				  rsort($c);
				 $arrayCDecreasing = implode(",", $c);

				
		
			}
	 ?>
	<form action="" method="post">
		<table align="center">
			<tr>
				<td colspan="2">
					<p>ĐẾM PHẦN TỬ, GHÉP MẢNG VÀ SẮP XẾP</p>
				</td>

			</tr>
			<tr>
				<td>
					Mảng A: 
				</td>
				<td><input type="text" name="arrayA" echo ></td>
			</tr>
			<tr>
				<td>
					Mảng B: 
				</td>
				<td><input type="text" name="arrayB"></td>
			</tr>
			<tr>
				<td>
					<input type="submit" value="Thực hiện">
				</td>
			</tr>
			<tr>
				<td>
					Số phần tử mảng A: <input type="text" name="countA" disabled="disabled" value="<?php echo $countA;?>">
				</td>
			</tr>
			<tr>
				<td>
					Số phần tử mảng B: <input type="text" name="countB" disabled="disabled" value="<?php echo $countB;?>">
				</td>
			</tr>
			<tr>
				<td>
					Mảng C: <input type="text" name="arrayC"disabled="disabled" value="<?php echo $arrayC;?>">
				</td>
			</tr>
			<tr>
				<td>
					Mảng C tăng dần: <input type="text" name="arrayCIncresing" disabled="disabled" value="<?php echo $arrayCIncresing;?>">
				</td>
			</tr>
			<tr>
				<td>
					Mảng C giảm dần: <input type="text" name="arrayCDecreasing"disabled="disabled" value="<?php echo $arrayCDecreasing;?>">
				</td>
			</tr>
			
		</table>
	</form>
</body>
</html>