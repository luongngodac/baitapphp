<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tìm kiếm</title>
    <link rel="stylesheet" href="">
    <style>
        body {
            background-color: aquamarine;
        }

        .container {
            margin: 20px 0;
            text-align: center;

        }

        .container button {
            background: #ccffff;
            border-radius: 1px;
            text-align: center;
        }

        .top {
            margin-left: 200px;
        }

        form {
            width: 450px;
            border: 1px solid black;
            display: flex;
            margin: auto auto;

        }
        input {
            width: 300px;
        }

        
    </style>
</head>

<body>
    <?php
    function Search($array, $number)
    {
        $n = count($array);
        $result = -1;
        for ($i = 0; $i < $n; $i++) {
            if ($array[$i] == $number) {
                $result = $i;
                break;
            }
        }
        return $result;
    }
    $newArray = null;
    $string = null;
    if (isset($_POST['array']) && isset($_POST['number'])) {
        $oldArray = trim($_POST['array']);
        $number = $_POST['number'];
        $array = explode(",", $oldArray);
        $result = Search($array, $number);
        $newArray = implode(",", $array);
        if ($result <> -1) {
            $result = $result + 1;
            $string = "Tìm thấy " . $number . " tại ví trí " . $result . " của mảng.";
        } else {
            $string = "Không tìm thấy " . $number . " trong mảng";
        }
    }
    ?>
    <form action="" method="post">
        <table align="center">
            <tr>
                <td colspan="2">
                    <h1 style="color: white; background-color: blueviolet;" align="center">TÌM KIẾM</h1>
                </td>
            </tr>
            <tr>
                <td>
                    Nhập mảng:
                </td>
                <td><input type="text" name="array" echo></td>
            </tr>
            <tr>
                <td>
                    Nhập số cần tìm:
                </td>
                <td><input type="text" name="number" style="width: 100px;"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Tìm kiếm" style="width: 100px;">
                </td>
            </tr>
            <tr>
                <td>
                    Mảng:
                </td>
                <td><input type="text" disabled="disabled" value="<?php echo $newArray; ?>"></td>
            </tr>
            <tr>
                <td>
                    Kết quả tìm kiếm:
                </td>
                <td><input style="color:red;" type="text" name="string" disabled="disabled" value="<?php echo $string; ?>"></td>
            </tr>
            <tr>
                <td colspan="2" style="background-color: burlywood;" align="center">
                    (Các phần tử trong mảng sẽ cách nhau bằng dấu ",")
                </td>
            </tr>
        </table>
    </form>
</body>

</html>