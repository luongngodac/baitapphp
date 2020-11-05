<?php
	$n = rand(1,1000);
	echo "Giá trị của n là $n <br>";
	echo "====Ý 1: Kiểm tra số nguyên tố====<br>";
	if (($n == 1) && ($n == 0))
		echo "$n không phải là số nguyên tố!";
	else
	{

		for ($i = 2; $i <= round(sqrt($n)); $i++)
		{
			if ($n % $i == 0)
			{
				echo "$n không phải là số nguyên tố!";
				break;
			}
			else
				if ($i == round(sqrt($n)))
					echo "$n là số nguyên tố!";
		}
	}

	echo "<br>====Ý 2: Tính tổng các số lẻ có 2 chữ số và nhỏ hơn $n====<br>";
	if ($n < 11)
		echo "Tổng = 0";
	else
	{
		$s = 0;
		echo "Tổng các số lẻ là: <br>";
		for ($j = 11; $j <= $n && $j <=100  ; $j++)
			if(($j % 2) != 0)
			{
				echo "$j  ";
				$s += $j;
			}
		echo "<br>Tổng = $s";
	}

	//Ý 3: hỏi n có bao nhiêu chữ số.
	$m = $n;
	$t = 0;
	do
	{
		$m = $m / 10;
		$t = $t + 1;
	} while($m > 1);
	echo "<br>====Ý 3: $n có $t chữ số.====";
?>












