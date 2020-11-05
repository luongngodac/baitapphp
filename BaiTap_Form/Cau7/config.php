<?php
    if(isset($_POST['txthoten'],$_POST['txtdiachi'],$_POST['txtsdt'],$_POST['comments']))
        {
            $hoten= $_POST['txthoten'];
            $diachi= $_POST['txtdiachi'];
            $comments= $_POST['comments'];
            if(is_numeric($_POST['txtsdt']))
            {
                $sdt= $_POST['txtsdt'];
            }
            else{
                $sdt = 'Nhập sai';
            }
        }
   
?>

<h3>Bạn đã đăng nhập thành công, dưới đây là những thông tin bạn nhập:</h3>
<p class="">Họ tên: <?php echo $hoten ?></p>
<p class="">Giới tính:  <?php if(isset($_POST['gioitinh'])&&$_POST['gioitinh']=='Nam') 
                                 echo 'Nam';
                                else echo'Nữ'; ?> 
</p>
<p class="">Địa chỉ: <?php echo $diachi ?></p>
<p class="">Điện thoại: <?php echo $sdt ?></p>
<p class="">Quốc tịch: 
    <?php if(isset($_POST['qt']) && $_POST['qt']=='vn') 
        echo 'Việt Nam';
    elseif(isset($_POST['qt'])&&$_POST['qt']=='cn') 
        echo 'Trung Quốc';
    else {
        echo 'Hàn Quốc';}?> 
    </p>
<p class="">Môn học:
<?php if(isset($_POST['monhoc'])) 
        foreach($_POST['monhoc'] as $monhoc)
            {
                echo $monhoc. "\n";
            }
    
    else {
        echo 'Bạn chưa học môn nào ! ';}?> 
 </p>
<p class="">Ghi chú: <?php echo $comments ?></p>
<?php echo "<a href=\"javascript:history.go(-1)\">Trở về trang trước</a>"; ?>
