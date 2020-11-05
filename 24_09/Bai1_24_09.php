<?php

	$n = rand(1, 100);
	echo "Giá trị của n là $n <br>";
	echo "Các số chẵn <= $n là: ";
	for($i = 0; $i <= $n; $i++)
	{
		if($i % 2 == 0)
		echo "$i  ";
	}
	// Hiển thị từ 1-> n; số lẽ thì bôi đậm

	echo "<br>Câu 1b: Hiển thị từ 1-> n, nếu gặp số lẽ thì bôi đậm.<br>";
	for($i = 0; $i <= $n; $i++)
	{
		if($i % 2 == 0)
			echo "$i  ";
		else
			echo "<b>$i  </b>";
	}

?>