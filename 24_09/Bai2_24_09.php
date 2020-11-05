<?php
	echo "BẢNG CỬU CHƯƠNG<br>";
	for($i = 2; $i<= 9; $i++ )
	{
		echo "<br>BẢNG CỬU CHƯƠNG $i<br>";
		for($j = 1; $j <= 10; $j++)
		{
			$s = $i*$j;
			echo "$i x $j = $s<br>";
		}
		echo "\n";
	}

?>