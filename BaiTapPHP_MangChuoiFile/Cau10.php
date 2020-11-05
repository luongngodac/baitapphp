<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Giỏ hoa</title>
	<link rel="stylesheet" href="">
</head>
<body>
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
	<form action=""method="post">
		<table align="center">
			<tr>
				<td>
					<h1>MUA HOA</h1>
				</td>
			</tr>
			<tr>
				<td>
					Loại hoa bạn chọn: <input type="text" name="type">
				</td>
				<td>
					<input type="submit" value="Thêm vào giỏ hoa">
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
				<td>
					<p>
						Giỏ hoa bạn chọn:
					</p>
				</td>
			</tr>
			<tr>
				<td>
					 <textarea name="gioHoa" cols="70" rows="4" disable>
                            <?php echo $gioHoa;  ?>
                        </textarea>
				</td>
			</tr>
			
		</table>
	</form>
</body>
</html>