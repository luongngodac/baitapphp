<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../../Web/login.php');
}
?>
<?php
    $conn = mysqli_connect('localhost', 'root', '', 'qlbansua');
    mysqli_set_charset($conn, 'UTF8');
    $sql="select Ma_khach_hang, Ten_khach_hang, Phai, Dia_chi,Dien_thoai,Email from khach_hang";
    $result = mysqli_query($conn, $sql);
    echo "<p align='center'><font size='5'> <b>THÔNG TIN KHÁCH HÀNG</font></b></P>";
    echo "<table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='border-
    collapse:collapse'>";
    echo '<tr style="color: red">
    <th width="50" ">STT</th>
    <th width="150">Mã khách hàng</th>
    <th width="300">Tên khách hàng</th>
    <th width="150" >Giới tính</th>
    <th width="400">Địa chỉ</th>
    <th width="150">Số điện thoại </th>
    <th with ="350"> Email</th>
    </tr>';
    if(mysqli_num_rows($result)<>0)//tại đây sai là do câu lệnh sql sai, chỉ về đây.
    { $stt=1;
    while($rows=mysqli_fetch_array($result))
    {   $color = '';
        if($stt %2==0)
        {
            $color='#ffff99';
        }
        else{$color='';}
        
        echo "<tr style='background-color: $color'>"; 
        echo "<td>$stt</td>"; 
        echo "<td>$rows[Ma_khach_hang]</td>"; 
        echo "<td>$rows[Ten_khach_hang]</td>";
    
        
            if($rows['Phai'] != 0) {
                echo '<td style="text-align: center;"><img src="female.jpg" style="width: 50px;"></td>';
            }
            else {
                echo '<td style="text-align: center;"><img src="male.jpg" style="width: 50px;"></td>';
            }
        

        echo "<td>$rows[Dia_chi]</td>";
        echo "<td>$rows[Dien_thoai]</td>";
        echo "<td>$rows[Email]</td>";
        echo "</tr>";
        $stt+=1;
    }//while
}
echo"</table>";