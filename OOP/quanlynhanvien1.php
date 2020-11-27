<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../Web/login.php');
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Tính lương nhân viên</title>

    <style>
        fieldset {
            background-color: #eeeeee;
        }

        fieldset tr {
            font-size: 20px;
        }

        legend {
            background-color: gray;
            color: white;
            padding: 5px 10px;

        }

        body {
            width: 100vw;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            font-size: 17px;
            overflow-x: hidden;
        }

        input {
            margin: 5px;
            height: 20px;
        }
    </style>
</head>

<body>
    <?php
    abstract class NhanVien
    {

        protected $hoten, $gioitinh, $ngayvaolam, $hesoluong, $socon;

        const LUONGCOBAN = 5000000;

        public function setGioitinh($gioitinh)
        {
            $this->gioitinh = $gioitinh;
        }
        public function getGioitinh()
        {
            return $this->gioitinh;
        }

        public function setNgayvaolam($ngayvaolam)
        {
            $this->ngayvaolam = $ngayvaolam;
        }
        public function getNgayvaolam()
        {
            return $this->ngayvaolam;
        }

        public function setHesoluong($hesoluong)
        {
            $this->hesoluong = $hesoluong;
        }
        public function getHesoluong()
        {
            return $this->hesoluong;
        }

        public function setSocon($socon)
        {
            $this->socon = $socon;
        }
        public function getSocon()
        {
            return $this->socon;
        }

        abstract public function tinh_tien_luong();
        abstract public function tinh_tro_cap();
        public function tinh_tien_thuong()
        {
            $date = explode("-", $this->ngayvaolam);
            $currentDate = getdate();
            return ($currentDate['year'] - $date[0]) * 1000000;
        }
    }

    class VanPhong extends NhanVien
    {

        private $songayvang;

        const DONGIAPHAT = 200000;
        const DINHMUCVANG = 3;

        function __construct($gioitinh, $ngayvaolam, $hesoluong, $socon, $songayvang)
        {

            $this->gioitinh = $gioitinh;
            $this->ngayvaolam = $ngayvaolam;
            $this->hesoluong = $hesoluong;
            $this->socon = $socon;
            $this->songayvang = $songayvang;
        }

        public function setSongayvang($songayvang)
        {
            $this->songayvang = $songayvang;
        }
        public function getSongayvang()
        {
            return $this->songayvang;
        }

        function tinh_tien_phat()
        {
            if ($this->songayvang > self::DINHMUCVANG) {
                return $this->songayvang * self::DONGIAPHAT;
            } else {
                return 0;
            }
        }

        function tinh_tro_cap()
        {
            if ($this->gioitinh == "Nữ") {
                return 200000 * $this->socon * 1.5;
            } else {
                return 200000 * $this->socon;
            }
        }

        function tinh_tien_luong()
        {

            return NhanVien::LUONGCOBAN * $this->hesoluong;
        }
    }

    class SanXuat extends NhanVien
    {
        private $sosanpham;

        public function setSosanpham($sosanpham)
        {
            $this->sosanpham = $sosanpham;
        }

        public function getSosanpham()
        {
            return $this->sosanpham;
        }

        const DINHMUCSP = 100;
        const DONGIASP = 100000;

        function tinh_tien_thuong()
        {
            if ($this->sosanpham > self::DINHMUCSP) {
                return ($this->sosanpham - self::DINHMUCSP) * self::DONGIASP * 0.03;
            } else {
                return 0;
            }
        }

        function tinh_tro_cap()
        {
            return $this->socon * 120000;
        }

        function tinh_tien_luong()
        {
            return ($this->sosanpham * self::DONGIASP) + SanXuat::tinh_tien_thuong();
        }
    }

    if (isset($_POST['ten'])) {
        $ten = $_POST['ten'];
    } else {
        $ten = NULL;
    }

    if (isset($_POST['gioitinh']) && $_POST['gioitinh'] == "nu") {
        $gioitinh = "Nữ";
    } else {
        $gioitinh = "Nam";
    }
    if (isset($_POST['socon'])) {
        $socon = $_POST['socon'];
    } else {
        $socon = NULL;
    }

    if (isset($_POST['hesoluong'])) {
        $hesoluong = $_POST['hesoluong'];
    } else {
        $hesoluong = NULL;
    }
    if (isset($_POST['ngaysinh'])) {
        $ngaysinh = $_POST['ngaysinh'];
    } else {
        $ngaysinh = NULL;
    }
    if (isset($_POST['ngayvaolam'])) {
        $ngayvaolam = $_POST['ngayvaolam'];
    } else {
        $ngayvaolam = NULL;
    }
    if (isset($_POST['songayvang'])) {
        $songayvang = $_POST['songayvang'];
    } else {
        $songayvang = NULL;
    }
    if (isset($_POST['sosanpham'])) {
        $sosanpham = $_POST['sosanpham'];
    } else {
        $sosanpham = NULL;
    }
    $strTienluong = NULL;
    $strTienthuong = NULL;
    $strTienphat = NULL;
    $strThuclinh = NULL;
    $strTientrocap = NULL;
    if (isset($_POST['tinh'])) {
        if (isset($_POST['loainv']) && ($_POST['loainv']) == "vp") {
            $vp = new VanPhong($gioitinh, $ngayvaolam, $hesoluong, $socon, $songayvang);
            $vp->setSongayvang($_POST['songayvang']);
            $strTienphat = $vp->tinh_tien_phat() . " VNĐ";
            $vp->setSocon($_POST['socon']);
            $strTientrocap = $vp->tinh_tro_cap() . " VNĐ";
            $vp->setHesoluong($_POST['hesoluong']);
            $strTienluong = $vp->tinh_tien_luong() . " VNĐ";
            $strTienthuong = $vp->tinh_tien_thuong() . " VNĐ";
            $strThuclinh = ($vp->tinh_tro_cap() + $vp->tinh_tien_luong() + $vp->tinh_tien_thuong()) - $vp->tinh_tien_phat() . " VNĐ";
        }
        else if (isset($_POST['loainv']) && ($_POST['loainv']) == "sx") {
            $sx = new SanXuat();
            $sx->setSocon($_POST['socon']);
            $strTientrocap = $sx->tinh_tro_cap() . " VNĐ";
            $sx->setSosanpham($_POST['sosanpham']);
            $strTienthuong = $sx->tinh_tien_thuong() . " VNĐ";
            $strTienluong = $sx->tinh_tien_luong() . " VNĐ";
            $strThuclinh = $sx->tinh_tro_cap() + $sx->tinh_tien_luong() . " VNĐ";
        }
    }
    ?>

    <form action="" method="POST">
        <fieldset>
            <legend>QUẢN LÝ NHÂN VIÊN</legend>

            <table border='0'>
                <tr>
                    <td>Họ và tên: </td>
                    <td><input type="text" name="ten" value="<?php echo "$ten" ?>" /></td>
                    <td>Số con: </td>
                    <td><input type="number" name="socon" min="0" step="1" value="<?php echo "$socon" ?>" /></td>
                </tr>

                <tr>
                    <td>Ngày sinh: </td>
                    <td><input type="date" name="ngaysinh" value="<?php echo "$ngaysinh" ?>"></td>
                    <td>Ngày vào làm: </td>
                    <td><input type="date" name="ngayvaolam" value="<?php echo "$ngayvaolam" ?>"></td>
                </tr>

                <tr>
                    <td>Giới tính: </td>
                    <td>
                        <input type="radio" name="gioitinh" value="nam" <?php if (isset($_POST['gioitinh']) && ($_POST['gioitinh']) == "nam") echo 'checked="checked"' ?> />Nam
                        <input type="radio" name="gioitinh" value="nu" <?php if (isset($_POST['gioitinh']) && ($_POST['gioitinh']) == "nu") echo 'checked="checked"' ?> />Nữ
                    </td>
                    <td>Hệ số lương: </td>
                    <td><input type="number" name="hesoluong" step="0.1" min="1" value="<?php if (isset($_POST['hesoluong'])) echo number_format($_POST['hesoluong'], 1, '.', ' '); ?>" />
                    </td>
                </tr>

                <tr>
                    <td>Loại nhân viên: </td>
                    <td>
                        <input type="radio" name="loainv" value="vp" <?php if (isset($_POST['loainv']) && ($_POST['loainv']) == "vp") echo 'checked="checked"' ?> />Văn phòng
                    </td>
                    <td>
                        <input type="radio" name="loainv" value="sx" <?php if (isset($_POST['loainv']) && ($_POST['loainv']) == "sx") echo 'checked="checked"' ?> />Sản xuất
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        Số ngày vắng: <input type="number" name="songayvang" step="1" min="0" value="<?php if (isset($_POST['songayvang'])) echo $_POST['songayvang']; ?>" />
                    </td>
                    <td colspan="2">
                        Số sản phẩm: <input type="number" name="sosanpham" step="1" min="0" value="<?php if (isset($_POST['sosanpham'])) echo $_POST['sosanpham']; ?>" />
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td colspan="2" align="center"><input type="submit" name="tinh" value="TÍNH LƯƠNG" /></td>
                </tr>

                <tr>
                    <td>Tiền lương: </td>
                    <td><input type="text" name="tienluong" disabled value="<?php echo $strTienluong; ?>" /></td>
                    <td>Trợ cấp: </td>
                    <td><input type="texttext" name="trocap" disabled value="<?php echo $strTientrocap; ?>" /></td>
                </tr>
                <tr>
                    <td>Tiền thưởng:</td>
                    <td><input type="text" name="tienthuong" disabled value="<?php echo $strTienthuong; ?>"></td>
                    <td>Tiền phạt:</td>
                    <td><input type="text" name="tienphat" disabled value="<?php echo $strTienphat; ?>"></td>
                </tr>
                <tr>
                    <td colspan="4" align="center">
                        Thực lĩnh: <input type="text" name="thuclinh" disabled value="<?php echo $strThuclinh; ?>">
                    </td>
                </tr>
            </table>

        </fieldset>

    </form>



</body>

</html>