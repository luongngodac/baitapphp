<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-with">
    <title>Cong tru nhan chia</title>
</head>
<body>
    <h1>Cong tru nhan chia</h1>
    <form action="" method="post">
        So hang a <input type="text" name="txtA" value=""/> <br>
        So hang b <input type="text" name="txtB" value=""/> <br>
        <input type ="submit" value="-" name="btnSubmit"/>
        <input type ="submit" value="+" name="btnSubmit"/>
        <input type ="submit" value="*" name="btnSubmit"/>
        <input type ="submit" value="/" name="btnSubmit"/>
             
    </form>
    <?php 
        function pheptinh($pt, $a, $b)
        {
            if($pt=='+'){
                return $a+$b;
            } else if($pt == '-'){
                return $a-$b;
            } else if($pt == '*'){
                return $a*$b;
            } else if($pt == '/'){
                if($b != 0){
                    return $a/$b;
                } else{
                    echo 'Khong the chia cho 0';
                }
            }
        }
        if(isset($_POST['btnSubmit']))
        {
            $a = $_POST['txtA'];
            $b = $_POST['txtB'];
            $pt = $_POST['btnSubmit'];
            if($pt == '+')
            {
                $kq = pheptinh($pt, $a, $b);
                echo 'Ket qua phep Cong: '.$kq;
            }
            else if($pt == '-')
            {
                $kq = pheptinh($pt, $a, $b);
                echo 'Ket qua phep Tru: '.$kq;
            }
            else if($pt == '*')
            {
                $kq = pheptinh($pt, $a, $b);
                echo 'Ket qua phep Nhan: '.$kq;
            }
            else if($pt == '/')
            {
                $kq = pheptinh($pt, $a, $b);
                echo 'Ket qua phep Chia: '.$kq;
            }

        }
    ?>
</body>
</html>