<?php
    $conn = mysqli_connect('localhost', 'root', '', 'qlbansua');
    mysqli_set_charset($conn, 'UTF8');
    $sql="select Ma_hang_sua,Ten_hang_sua,Dia_chi,Dien_thoai,Email from hang_sua";
    $result = mysqli_query($conn, $sql);
    echo "<p align='center' ><font size='5'> THÔNG TIN HÃNG SỮA</font></P>";
    echo "<table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='border-
    collapse:collapse'>";
    echo '<tr>
    <th width="50">STT</th>
    <th width="50">Mã hãng sữa</th>
    <th width="150">Tên hãng sữa</th>
    <th width="200">Địa chỉ</th>
    <th width="250">Điện thoại </th>
    <th with ="350"> Email</th>
    </tr>';
    if(mysqli_num_rows($result)<>0)//tại đây sai là do câu lệnh sql sai, chỉ về đây.
    { $stt=1;
    while($rows=mysqli_fetch_array($result))
    {   
        echo ""; 
        echo "<td>$stt</td>"; 
        echo "<td>$rows[Ma_hang_sua]</td>"; 
        echo "<td>$rows[Ten_hang_sua]</td>";
        echo "<td>$rows[Dia_chi]</td>";
        echo "<td>$rows[Dien_thoai]</td>";
        echo "<td>$rows[Email]</td>";
        echo "</tr>";
        $stt+=1;
    }//while
}
echo"</table>";