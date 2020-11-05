<?php 
	// Viết một trang web nhận 2 số m, n là các số tự nhiên có giá trị từ 2->5 sau đó:
	// Tạo một ma trận có kích thược mxn, với các phần tử ngẫu nhiên thuộc [-100,100]. In ra ma trận vừa tạo.
	// Thay thể các phần tử có giá trị âm trong ma trận thành 0. In ra ma trận vừa thay đổi.
//Ý 1:
	$m = rand (2, 5);//đây là ngẫu nhiên của m.
	$n = rand (2, 5);
	echo "Số hàng là: $m<br>";
	echo "Số cột là: $n<br>";
	$a = array();
	for ($i = 0; $i < $m; $i ++)
	{
		for ($j = 0; $j < $n; $j ++)
		{
			$a[$i][$j] = rand (-100, 100);
			echo "  ".$a[$i][$j];
		}
		echo "<br>";
	}
?>