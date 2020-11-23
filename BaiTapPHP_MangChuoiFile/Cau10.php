<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Giỏ hoa</title>
	<link rel="stylesheet" href="">
	<style>
		body{
			background-color: #b3cccc;
		}
		form{
			width: 441px;
			border: 1px solid black;
			display: flex;
			margin: 0 auto;/*Cai nay de cho no ra giua thoi*/
			background-color: #ff8080;
		}
		#tr1{
			background-color: yellow;
		}
	</style>
</head>

<body>
	<?php 
	    
		// function timhoa($tenhoa, $manghoa)
		// {
		// 	count($manghoa);
		// 	$kq = 0;
		// 	for ($i=0; $i < count($manghoa); $i++)
		// 	{
		// 		if(strcasecmp($manghoa[$i], $tenhoa) == 0)
		// 		$kq = 1;
		// 	}
		// 	return $kq;
		// }

		// $manghoa = null;
		// $chuahoa = null;
		// $result = null;
		// if(isset($_POST['loaihoa'])){
		// 	$tenhoa = trim($_POST['loaihoa']);
		// 	$manghoa  = trim($_POST['giohoa']);
		// 	$chuahoa = explode("--", $manghoa);
		// 	$n = count($chuahoa);
		// 	if(timhoa($tenhoa, $chuahoa) == 1)
		// 		$result = "Đã có hoa <$tenhoa> trong giỏ";
		// 	else
		// 		$chuahoa[$n] = $tenhoa;
		// 	$manghoa = implode("--", $chuahoa);
		// }
		
	?>

<?php
		function arrFindFlowers($type,$cart){
			$n = count($cart);
			$result = 0;
			for($i=0;$i<$n;$i++){
				if(strcasecmp($type, $cart[$i]) == 0){
					$result = 1;
				}
			}
			return $result;
		}
		$result =null;
		$gioHoa=null;

		if(isset($_POST['type'])){
			$type =$_POST['type'];
			$cart = array();
			$cart = explode("--", trim($_POST['gioHoa']));
			$n =count($cart);
			if(arrFindFlowers($type,$cart) ==1){
				$result = "Đã có hoa $type trong giỏ";
			}
			else
				$cart[$n] = $type;
			$gioHoa  = implode("--", $cart);
		}
	?>

	<form action="" method="post">
		<table >
			<tr id="tr1" style="text-align: center">
				<td colspan="3">
					<p style="font-style: italic;">MUA HOA</p>
				</td>
			</tr>
			<tr>
				<td>
					<span style="color: red"><b>Loại hoa bạn chọn:</b></span>
				</td>
				<td>
					<input style="background-color: white;" name="type" type="text" value="">
				</td>
				<td>
					<input style="text-align: center;" type="submit" value="Thêm vào giỏ hoa">
				</td>
			</tr>
			<tr>
				<td>
					<label>
						<p style="background: #FFFFCC">
							<?php
								echo $result;
							?>
						</p>
					</label>
				</td>
			</tr>
			<tr>
				<td><b><span style="color:red">Giỏ hoa bạn có:</span></b></td>
			</tr>
			<tr>
				<td colspan="3" >
					<textarea name="gioHoa" style="width: 430px;" disable ><?php echo $gioHoa ?>
					</textarea>
				</td>
			</tr>
		</table>
	</form>
</body>

</html>