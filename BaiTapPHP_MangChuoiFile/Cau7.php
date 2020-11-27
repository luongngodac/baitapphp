<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../Web/login.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mảng thay thế</title>
    <link rel="stylesheet" href="">
    <style>
        body {
            background-color: aquamarine;
        }

        .top {
            margin-left: 200px;
        }

        form {
            width: 400px;
            border: 1px solid black;
            display: flex;
            margin: 0 auto;

        }

        button {
            margin: 50px 10px 0 10px;
        }
        table{

            padding: 0px;
        }
        td{
            background-color: #ccffff;
        }
    </style>
</head>

<body>
    <?php
    function replace($array, $oldNumber, $newNumber)
    {
        $n = count($array);
        for ($i = 0; $i < $n; $i++) {
            if ($array[$i] == $oldNumber) {
                $array[$i] = $newNumber;
                break;
            }
        }
        return $array;
    }
    $oldArray = null;
    $newArray = null;
    $array = null;
    $oldNumber = null;
    $newNumber = null;
    if (isset($_POST['array']) && isset($_POST['oldNumber']) && isset($_POST['newNumber'])) {
        $secondOldArray = trim($_POST['array']);
        $oldNumber = $_POST['oldNumber'];
        $newNumber = $_POST['newNumber'];
        $array = explode(",", $secondOldArray);
        $oldArray = implode(" ", $array);
        $result = replace($array, $oldNumber, $newNumber);

        $newArray = implode(" ", $result);
    }
    ?>
    <form action="" method="post">
        <table align="center">
            <tr>
                <td colspan="2" align="center" style="background-color: blue; color:#ccffff">
                    <p style="line-height: 1px; font-size: 25px;">THAY THẾ </p>
                </td>
            </tr>
            <tr>
                <td>
                    Nhập các phần tử: 
                </td>
                <td><input type="text" name="array"></td>
            </tr>
            <tr>
                <td>
                    Giá trị cần thay thế: 
                </td>
                <td><input type="text" name="oldNumber" value="<?php echo $oldNumber; ?>"></td>
            </tr>
            <tr>
                <td>
                    Giá trị thay thế: 
                </td>
                <td><input type="text" name="newNumber" value="<?php echo $newNumber; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td style="color: wheat;">
                    <input type="submit" value="Thay thế" >
                </td>
            </tr>
            <tr>
                <td>
                    Mảng cũ: 
                </td>
                <td><input style="background-color: red; color:black;" type="text" disabled="disabled" value="<?php echo $oldArray; ?>"></td>
            </tr>
            <tr>
                <td>
                    Mảng mới: 
                </td>
                <td><input style="background-color: red; color:black;" type="text" disabled="disabled" value="<?php echo $newArray; ?>"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><p style="line-height: 1px;">(<span style="color: red;">Ghi chú</span>: Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</p></td>
            </tr>
        </table>
    </form>
</body>

</html>