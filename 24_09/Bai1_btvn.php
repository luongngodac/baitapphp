<?php
// Bài tập 1: Viết 1 trang web nhận một giá trị ngẫu nhiên là số tự nhiên N
// có giá trị từ -50->50. Sau đó:
// Kiểm tra N  có phải số dương? Nếu là số âm thì thay đổi giá trị của N thành 
// số đảo của nó.
// Tạo một mảng có N phần tử, trong đó các phần tử số nguyên 
// nhận giá trị số ngẫu nhiên thuộc [-100,100].In ra mảng được tạo.
// Tính tổng các phần tử ở vị trí lẻ trong mảng. 
	$n = rand(-50,50);
	echo "Số tự nhiên n là: $n<br>";
	if ($n == 0) 
		echo "$n là số $n";
	else
	{
		if ($n > 0)
			echo "$n là số nguyên dương.<br>";
		else
		{
			echo "$n không phải là số nguyên dương.<br>";
			$n = abs($n);
			echo "Số đảo của -$n là : $n<br>";
		}
	}

// Ý 2: tạo mảng
	$a = [$n];
	$s = 0;
	echo "Mảng gồm $n phần tử.<br>";
	for($i = 0; $i < $n; $i++)
	{
		$a[$i] = rand(-101,101);// vì sao khi dùng ngoặc vuông lại không được ?
		echo "$a[$i]  ";
		if($i % 2 != 0)
			$s += $a[$i];
	}
	echo "<br> Tổng của các phần tử ở vị trí lẻ trong mảng là: $s";
?>
