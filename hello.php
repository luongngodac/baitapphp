<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiểm tra</title>
</head>

<body>
    <?php
    static $arr;
    class SinhVien
    {

        public $maso, $hoten, $gioitinh, $lop, $diachi, $ngaysinh;
        public function __construct($maso, $hoten, $gioitinh, $lop, $diachi, $ngaysinh)
        {
            $this->maso = $maso;
            $this->hoten = $hoten;
            $this->gioitinh = $gioitinh;
            $this->lop = $lop;
            $this->diachi = $diachi;
            $this->ngaysinh = $ngaysinh;
        }
        public function add($sv, &$arr)
        {
            $arr[$this->maso] = $sv;
        }
    }
    $maso = $_POST['maso'] ?? "";
    $hoten = $_POST['hoten'] ?? "";
    $gioitinh = $_POST['gioitinh'] ?? "";
    $lop = $_POST['lop'] ?? "";
    $diachi = $_POST['diachi'] ?? "";
    $ngaysinh = $_POST['ngaysinh'] ?? "";

    if (isset($_POST['them'])) {
        $sv = new SinhVien($_POST['maso'], $_POST['hoten'], $_POST['gioitinh'], $_POST['lop'], $_POST['diachi'], $_POST['ngaysinh']);
        $sv->add($sv, $arr);
        $maso = $_POST['maso'] ;
        $hoten = $_POST['hoten'] ;
        $gioitinh = $_POST['gioitinh'] ;
        $lop = $_POST['lop'] ;
        $diachi = $_POST['diachi'] ;
        $ngaysinh = $_POST['ngaysinh'] ;
    }else{
        $maso = "";
        $hoten = "";
        $gioitinh = "";
        $lop= "";
        $diachi = "";
        $ngaysinh = "";
    }
    if (isset($_POST['xem'])) {
        $maso = $_POST['sv'];
        $gioitinh = $arr[$maso]->gioitinh;
    } else {
        $maso1 = "";
        $hoten1 = "";
        $gioitinh1 = "";
        $lop1 = "";
        $diachi1 = "";
        $ngaysinh1 = "";
    }

    ?>

    <form action="" method="post">
        <h1 align="center">HIỂN THỊ THÔNG TIN SINH VIÊN</h1>

        <h4 align="center">Chọn mã sinh viên:
            <select name="sv">
                <?php
                if ($arr != null) {
                    foreach ($arr as $key => $value) {
                        echo "<option>$key</option>";
                    }
                }
                ?>
            </select>
            <input type="submit" value="Xem thông tin" name="xem">
        </h4>
        <fieldset>
            <legend>Thông tin sinh viên</legend>

            <table>
                <tr>
                    <td>Mã số SV:</td>
                    <td><input type="text" name="maso"  style="width: 200px;" value="<?php echo $maso1; ?>"></td>
                    <td>Họ tên:</td>
                    <td><input type="text" name="hoten"  style="width: 300px;" <?php echo $hoten1; ?></td> </tr> <tr>
                    <td>Giới tính:</td>
                    <td><input type="text" name="gioitinh"  style="width: 200px;" <?php echo $gioitinh1; ?>></td>
                    <td>Lớp:</td>
                    <td><input type="text" name="lop"  style="width: 300px;" <?php echo $lop1; ?>></td>
                </tr>
                <tr>
                    <td>Ngày sinh:</td>
                    <td><input type="date" name="ngaysinh"  style="width: 200px;" <?php echo $ngaysinh1; ?>></td>
                    <td>Địa chỉ:</td>
                    <td><input type="text" name="diachi"  style="width: 300px;" <?php echo $diachi1; ?>></td>
                </tr>

            </table>

        </fieldset>
        <h5 align="center">Có tổng cộng 4 sinh viên,trong đó 3 sinh viên nam, 1 sinh viên nữ</h5>
    </form>
    <form action="" method="post">
        <form>
            <table>
                <tr align="center">
                    <td colspan="4">
                        <h1>Thêm sinh viên</h1>
                    </td>
                </tr>
                <tr>
                    <td>Mã số SV:</td>
                    <td><input type="text" name="maso" disabled required style="width: 200px;" <?php echo $maso; ?>></td>
                    <td>Họ tên:</td>
                    <td><input type="text" name="hoten" required style="width: 300px;" <?php echo $hoten; ?>></td>
                </tr>
                <tr>
                    <td>Giới tính:</td>
                    <td><input type="text" name="gioitinh" required style="width: 200px;" <?php echo $gioitinh; ?>></td>
                    <td>Lớp:</td>
                    <td><input type="text" name="lop" required style="width: 300px;" <?php echo $lop; ?>></td>
                </tr>
                <tr>
                    <td>Ngày sinh:</td>
                    <td><input type="date" name="ngaysinh" required style="width: 200px;" <?php echo $ngaysinh; ?>></td>
                    <td>Địa chỉ:</td>
                    <td><input type="text" name="diachi" required style="width: 300px;" <?php echo $diachi; ?>></td>
                </tr>
                <tr>
                    <td hidden colspan="4">

                    </td>
                </tr>
                <tr align="center">
                    <td colspan="4">
                        <input type="submit" name="them" value="Thêm sinh viên">
                    </td>
                </tr>
            </table>
        </form>
    </form>
</body>

</html>