<?php
    $conn = mysqli_connect('localhost', 'root', '', 'qlbansua');
    mysqli_set_charset($conn, 'UTF8');
    $sql='select Ma_khach_hang, Ten_khach_hang, Phai, Dia_chi, Dien_thoai from khach_hang';
    $result = mysqli_query($conn, $sql);
    echo "<p align='center'><font size='5'> THÔNG TIN SỮA</font></P>";
    echo "<table align='center' width='100%' border='1' cellpadding='2' cellspacing='2' style='bordercollapse:collapse'>";
    echo 
    '<tr style="color: red;">
            <th width="100">Mã khách hàng</th>
            <th width="150">Tên khách hàng</th>
            <th width="50"">Giới tính</th>
            <th width="350">Địa chỉ</th>
            <th width="100">Số điện thoại</th>
    </tr>';
    if(mysqli_num_rows($result)<>0)
    { 
        $stt=1;
        while($rows=mysqli_fetch_array($result))
        { 
            if($stt %2 != 0){
                echo "<tr style='background-color: pink;'>";
                echo "<td>$rows[Ma_khach_hang]</td>";
                echo "<td>$rows[Ten_khach_hang]</td>";
                if($rows['Phai'] == 1){
                    echo "<td style='text-align: center;'><img src='male.jpg' style='width: 50px;'></td>";
                }else{
                    echo "<td style='text-align: center;'><img src='female.jpg' style='width: 50px;'></td>";
                }
                echo "<td>$rows[Dia_chi]</td>";
                echo "<td>$rows[Dien_thoai]</td>";
                echo "</tr>";
            }
            else{
                echo "<tr>";
                echo "<td>$rows[Ma_khach_hang]</td>";
                echo "<td>$rows[Ten_khach_hang]</td>";
                if($rows['Phai'] == 1){
                    echo "<td style='text-align: center;'><img src='male.jpg' style='width: 50px;'></td>";
                }else{
                    echo "<td style='text-align: center;'><img src='female.jpg' style='width: 50px;'></td>";
                }
                echo "<td>$rows[Dia_chi]</td>";
                echo "<td>$rows[Dien_thoai]</td>";
                echo "</tr>";
            }
            
            $stt+=1;
        }
    }
?>