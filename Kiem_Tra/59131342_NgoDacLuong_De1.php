<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Thông tin sinh viên</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <?php
    $sinhvien = array(
        array("59131342", "Ngô Đắc Lương", "Nam", "59CNTT2", "10/01/2000", "Nghệ An"),
        array("60131333", "Huỳnh Tấn Đạt", "Nữ", "60CNTT1", "10/01/1999", "Nha Trang"),
        array("61133233", "Lại Thị Lê", "Nữ", "61CNTT3", "10/01/1999", "Nam Định")
    );
    ?>
    

    <form action="59131342_NgoDacLuong_De1_Y3.php" Method="POST" style="border: 1px solid blue;">
        <table align="center">
            <tr align="center">
                <td>
                    <h2>THÊM SINH VIÊN</h2>
                </td>
            </tr>

        </table>
        <fieldset>
            <legend><b> Thông tin sinh viên </b></legend>

            <!-- <table style='border:1px solid black; '> -->
            <table align="center">
                <tr>
                    <th>
                        <p>Mã số SV:</p>
                    </th>
                    <th><input type="text"  name="txtmaso" id="" style="width: 200px; "> </th>
                    <th>Họ tên:</th>
                    <th><input type="text"  name="txthoten" id="" style="width: 300px; "></th>
                </tr>

                <tr>
                    <th>
                        <p>Giới tính:</p>
                    </th>
                    <th><input type="text"  name="txtgioitinh" id="" style="width: 100px; "></th>
                    <th>Lớp:</th>
                    <th><input type="text"  name="txtlop" id="" style="width: 200px; "></th>
                </tr>

                <tr>
                    <th>
                        <p>Ngày sinh:</p>
                    </th>
                    <th><input type="text"  name="txtngaysinh" id="" style="width: 200px; "></th>
                    <th>Địa chỉ:</th>
                    <th><input type="text"  name="txtdiachi" id="" style="width: 300px; "></th>
                </tr>

            </table>

            <input type="submit" name="them" value="Thêm SV"></td>
        </fieldset>

    </form>
    <form action="" Method="POST" style="border: 1px solid blue; margin-top: 1px;">
        <table align="center">
            <tr align="center">
                <td>
                    <h2>HIỂN THỊ THÔNG TIN SINH VIÊN</h2>
                </td>
            </tr>
            <tr align="center">
                <td>Chọn mã số SV: <label for="Manufacturer"> </label>
                    <select id="mssv" name="laymaso">
                        <option value="0">59131342</option>
                        <option value="1">60131333</option>
                        <option value="2">61133233</option>
                    </select>

                    <input type="submit" name="search" value="Xem thông tin"></td>

            </tr>
        </table>
        <fieldset>
            <legend><b> Thông tin sinh viên </b></legend>

            <!-- <table style='border:1px solid black; '> -->
            <table align="center">
                <tr>
                    <th>
                        <p>Mã số SV:</p>
                    </th>
                    <th><input type="text" disabled name="txtmaso" id="" style="width: 200px; "> </th>
                    <th>Họ tên:</th>
                    <th><input type="text" disabled name="txthoten" id="" style="width: 300px; "></th>
                </tr>

                <tr>
                    <th>
                        <p>Giới tính:</p>
                    </th>
                    <th><input type="text" disabled name="txtgioitinh" id="" style="width: 100px; "></th>
                    <th>Lớp:</th>
                    <th><input type="text" disabled name="txtlop" id="" style="width: 200px; "></th>
                </tr>

                <tr>
                    <th>
                        <p>Ngày sinh:</p>
                    </th>
                    <th><input type="text" disabled name="txtngaysinh" id="" style="width: 200px; "></th>
                    <th>Địa chỉ:</th>
                    <th><input type="text" disabled name="txtdiachi" id="" style="width: 300px; "></th>
                </tr>

            </table>

        </fieldset>
        <p style="text-align: center;"> <?php echo "Có tổng cộng 4 sinh viên, trong đó có 3 sinh viên nam, 1 sinh viên nữ"; ?></p>
    </form>
</body>

</html>