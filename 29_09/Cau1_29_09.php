<?php 
	//Tao form minh hoa ket qua xo so Viettlot Power 6/55 thao dieu kien: 
	//tạo mảng
	$a = [6];
	echo "Mảng gồm 6 phần tử.<br>";
	$i = 0;
	do
	{
		$a[$i] = rand(1, 55);
		if($i > 0)
			$j = $i -1;
		else 
			$a[$j] = 0;
		$i++;
	}while ($a[$i] == $a[$j]);

	for($j = 0; $j <6; $j++)
	{
		for($i = $j; $i < 6; $i++)
		{
			if($a[$i] < $a[$j])
			{
				$t = $a[$i];
				$a[$i] = $a[$j];
				$a[$j] = $t;
			}
		}
	}
	for($i = 0; $i < 6; $i ++)
	{
		echo "$a[$i]  ";
	}
//ham str(string pad str pad.)	
?>
