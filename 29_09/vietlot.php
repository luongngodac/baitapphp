<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../Web/login.php');
}
?>
<?php 
	$x = [];
	$mua = [];
	for($i = 0; $i < 6; $i++){
		$mua[$i] = rand(1,55);
		if($i >= 1){
			for($y = 0; $y < $i; $y++){
				if($mua[$i] == $mua[$y]){
					$mua[$i] = rand(1,55);
				}
			}
		}
	}
	for($i = 0; $i < 7; $i++){
		$x[$i] = rand(1,55);
		if($i >= 1){
			for($y = 0; $y < $i; $y++){
				if($x[$i] == $x[$y]){
					$x[$i] = rand(1,55);
				}
			}
		}
	}

	for($i = 0; $i < 6; $i++){
		for($y = 0; $y < 5; $y++){
			if($x[$y]>$x[$i]){
				$tam = $x[$i];
				$x[$i] = $x[$y];
				$x[$y] = $tam;
			}
			if($mua[$y]>$mua[$i]){
				$tam = $mua[$i];
				$mua[$i] = $mua[$y];
				$mua[$y] = $tam;
			}
		}
	}

	
	echo "<h1 style='color: red; text-align:center'> Kết quả xổ số Vietlot ngày ".date("d/m/Y"). "</h1><br>";
	echo "<h1 style='color: red; text-align:center'>";
	for($i = 0; $i < 6; $i++){
		
		if($x[$i]< 10){
			echo "0", $x[$i];
			if($i < 5){
				echo "-";	
			}
			
		}
		else{
			echo $x[$i];
			if($i < 5){
				echo "-";	
			}
		}
		
	}
	echo "<span style='color: blue;'>\t|\t". $x[6]."</span>";
	echo "</h1>";

	echo "<h3>Số đã mua là</h3>";
	echo "<h2>";
	
	for($i = 0; $i < 6; $i++){
		
		if($mua[$i]< 10){
			echo "0", $mua[$i];
			if($i < 5){
				echo "-";	
			}
			
		}
		else{
			echo $mua[$i];
			if($i < 5){
				echo "-";	
			}
		}
		
	}
	echo "</h2>";

	$tong = 0;
	for($i = 0; $i < 6; $i++){
		for($y = 0; $y < 6; $y++){
			if($mua[$i] == $x[$y]){
				$tong += 1;
			}
		}
	}
	echo $tong;
	switch ($tong) {
		case 6:
			echo "<h1>Trúng giải Jackpot 1</h1>";
			break;
		case 5:
			echo "<h1>Trúng giải nhất</h1>";
			break;
		case 4:
			echo "<h1>Trúng giải nhì</h1>";
			break;
		case 3:
			echo "<h1>Trúng giải ba</h1>";
			break;
		
	}
 ?>