<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../Web/login.php');
}
?>
<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Phân số</title>

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

        input[type="radio"], input[type="checkbox"] {
            width: 26px;
        }
    </style>

</head>
<body>
<?php
    class PhanSo{
        protected $tuSo, $mauSo;

        public function PhanSo($tuSo, $mauSo){
            $this->tuSo = $tuSo;
            $this->mauSo = $mauSo;
        }

        public function setTuSo($tuSo){
            $this->tuSo = $tuSo;
        }
        public function getTuSo(){
            return $this->tuSo;
        }
        public function setMauSo($mauSo){
            $this->mauSo = $mauSo;
        }
        public function getMauSo(){
            return $this->mauSo;
        }

        public function toiGian(){
            $uc = UCLN($this->tuSo, $this->mauSo);
            $this->tuSo = $this->tuSo / $uc;
            $this->mauSo = $this->mauSo / $uc;
        }

        public function hienThi(){
            if($this->mauSo == 1)
                return $this->tuSo;

            else
                return $this->tuSo ." / " .$this->mauSo;

        }
        //public function Cong(PhanSo $ps1, PhanSo $ps2){
        public function Cong(PhanSo $ps2){
            $tuSo = $this->tuSo * $ps2->mauSo + $this->mauSo * $ps2->tuSo;
            $mauSo = $this->mauSo * $ps2->mauSo;
            return new PhanSo($tuSo, $mauSo);
        }
        public function Tru(PhanSo $ps2){
            $tuSo = $this->tuSo * $ps2->mauSo - $this->mauSo * $ps2->tuSo;
            $mauSo = $this->mauSo * $ps2->mauSo;
            return new PhanSo($tuSo, $mauSo);
        }
        public function Nhan(PhanSo $ps2){
            $tuSo = $this->tuSo * $ps2->tuSo;
            $mauSo = $this->mauSo * $ps2->mauSo;
            return new PhanSo($tuSo, $mauSo);
        }
        public function Chia(PhanSo $ps2){
            $tuSo = $this->tuSo * $ps2->mauSo;
            $mauSo = $this->mauSo * $ps2->tuSo;
            return new PhanSo($tuSo, $mauSo);
        }
    }
    function UCLN($a, $b){
        if($a % $b == 0)
            return $b;
        else
            return UCLN($b, $a % $b);
    }

    $TBKetQua = NULL;
    if(isset($_POST['tinh_toan'])){
        $tenPhepTinh = $_POST['pt'];
        $ps1 = new PhanSo($tuSo1, $mauSo1);
        $ps2 = new PhanSo($tuSo2, $mauSo2);
            if(isset($_POST['tu_so_1']) && is_numeric($_POST['mau_so_1'])){
                $tuSo1 = $_POST['tu_so_1'];
                $ps1->setTuSo($tuSo1);
            }
            else{
                $tuSo1 = NULL;
                $ps1->setTuSo($tuSo1);
            }
            if(isset($_POST['mau_so_1']) && is_numeric($_POST['mau_so_1'])){
                $mauSo1 = $_POST['mau_so_1'];
                $ps1->setMauSo($mauSo1);
            }
            else{
                $mauSo1 = NULL;
                $ps1->setMauSo($mauSo1);
            }
            if(isset($_POST['tu_so_2']) && is_numeric($_POST['tu_so_2'])){
                $tuSo2 = $_POST['tu_so_2'];
                $ps2->setTuSo($tuSo2);
            }
            else{
                $tuSo2 = NULL;
                $ps2->setTuSo($tuSo2);
            }
            if(isset($_POST['mau_so_2']) && is_numeric($_POST['mau_so_2'])){
                $mauSo2 = $_POST['mau_so_2'];
                $ps2->setMauSo($mauSo2);
            }
            else{
                $mauSo2 = NULL;
                $ps2->setMauSo($mauSo2);
            }
        }
        if(isset($_POST['tinh_toan'])){
            switch($_POST['pt']){
                case ($_POST['pt'] == "+"):
                    $kq = $ps1->Cong($ps2);
                    //$kq = Cong($ps1, $ps2);
                    $ketQua = "Phép cộng là: ";
                    break;
                case ($_POST['pt'] == "-"):
                    $kq = $ps1->Tru($ps2);
                    $ketQua = "Phép trừ là: ";
                    break;
                case ($_POST['pt'] == "*"):
                    $kq = $ps1->Nhan($ps2);
                    $ketQua = "Phép nhân là: ";
                    break;
                case ($_POST['pt'] == "/"):
                    $kq = $ps1->Chia($ps2);
                    $ketQua = "Phép chia là: ";
                    break;
            }
            $kq->toiGian();
            $TBKetQua = $ketQua .$ps1->hienThi() . " $tenPhepTinh " .$ps2->hienThi() ." = " .$kq->hienThi();
        }
?>


    <form action="" method="post">
    <fieldset>
        <legend>PHÂN SỐ</legend>
        <table>
            <tr>
                <td>Tử số 1 :</td>
                <td>
                    <input type="number" name="tu_so_1" value="<?php echo $tuSo1; ?>"/>
                </td>
                <td>Mẫu số 1: </td>
                <td>
                    <input type="number" name="mau_so_1" value="<?php echo $mauSo1; ?>"/>
                </td>
            </tr>
            <tr>
                <td>Tử số 2 :</td>
                <td>
                    <input type="number" name="tu_so_2" value="<?php echo $tuSo2; ?>"/>
                </td>
                <td>Mẫu số 2: </td>
                <td>
                    <input type="number" name="mau_so_2" value="<?php echo $mauSo2; ?>"/>
                </td>
            </tr>
            </tr>
                <td>Phép tính</td>
                <td>
                    <input type="radio" name="pt" value="+" /> Cộng
                    <input type="radio" name="pt" value="-" /> Trừ
                    <input type="radio" name="pt" value="*" /> Nhân
                    <input type="radio" name="pt" value="/" /> Chia
                </td>
            </tr>
            </tr>
                <td><input type="submit" name="tinh_toan" value="Tính toán" /></td>
            </tr>
            </tr>
                <td><?php echo $TBKetQua; ?></td>
            </tr>
        </table>
    </fieldset>
    </form>
</body>
</html>