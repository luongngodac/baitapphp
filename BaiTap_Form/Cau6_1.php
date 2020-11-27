<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../Web/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>FORM</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->

    <header>
        <!-- header inner -->

        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                    <div class="full">
                        <div class="center-desk">
                            <div class="logo">
                                <a href="index.html"><img src="images/logo.jpg" style="width: 50%;" alt="logo" /></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-9 col-sm-9">
                    <div class="menu-area">
                        <div class="limit-box">
                            <nav class="main-menu">
                                <ul class="menu-area-main">
                                    <li class="active"> <a href="../Web/index.html">Home</a> </li>
                                    <li> <a href="../Web/profile.html">Profile</a> </li>
                                    <li><a>exercise</a>
                                        <ul class="dropdown">
                                            <li><a href="../Web/form.html">From</a></li>
                                            <li><a href="../Web/file_stringarray.html">File String Array</a></li>
                                            <li><a href="../Web/oop.html">OOP</a></li>
                                            <li><a href="../Web/sql.html">SQL</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="../Web/contact.html">contact</a>
                                    </li>

                                    <li class="mean-last"> <a href="../Web/register.php">signup</a> </li>

                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
                    <li><a class="buy" href="../Web/login.php">Login</a></li>
                </div>
            </div>
        </div>
        <!-- Main Slider Start -->
        <div class="header">
            <div class="container-fluid">
                <div class="row" class="row">
                    <div class="col-md-3">
                        <nav class="navbar bg-light">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="form.html"><i class="fa fa-home"></i> FORM</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../BaiTap_Form/Cau1.php"></i>Exercise 1: Rectangular area</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../BaiTap_Form/Cau2.php"></i>Exercise 2: Area and circumference of a circle</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../BaiTap_Form/Cau3.php"></i>Exercise 3: Payment of electricity</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../BaiTap_Form/Cau4.php"></i>Exercise 4: University exam's result</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../BaiTap_Form/Cau5.php"></i>Exercise 5: Karaoke bill</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../BaiTap_Form/Cau6.php"></i>Exercise 6: Calculation on two numbers</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../BaiTap_Form/Cau7/form.html"></i>Exercise 7: Form html</a>
                                </li>
                            </ul>
                        </nav>
                    </div>


                </div>


            </div>
        </div>

        <!-- end header inner -->
    </header>
    <!-- end header -->



    <!-- CHOOSE  -->
    <div class="whyschose">
        <div class="container">

            <div class="row">
                <div class="col-md-7 offset-md-3">
                    <div class="title">
                        <h2>Why <strong class="black">choose PHP</strong></h2>
                        <span>PHP Open-source Nature Saves Budget!</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="choose_bg">
        <div class="container">
            <div class="white_bg">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="for_box">
                            <i><img src="icon/1.png" /></i>
                            <p>Development in PHP Is Less Time-consuming</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="for_box">
                            <i><img src="icon/2.png" /></i>
                            <p>PHP Code is Flexible and Integrative</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="for_box">
                            <i><img src="icon/3.png" /></i>
                            <p>PHP-based Services are Easily Scalable and Well-documented</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="for_box">
                            <i><img src="icon/4.png" /></i>
                            <p>PHP Software is Easily Maintained and Updated</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <a class="read-more" href="https://www.php.net/manual/en/intro-whatis.php">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end CHOOSE -->
    <footer>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <ul class="sociel">
                            <li> <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                            <li> <a href="https://twitter.com/?lang=vi"><i class="fa fa-twitter"></i></a></li>
                            <li> <a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="contact">
                            <h3>Liên hệ</h3>
                            <span>02 Nguyễn Đình Chiểu Trường Đại học Nha Trang<br>
                                Nha Trang, Việt Nam<br>
                                0583 831 149</span>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="contact">
                            <h3>ADDITIONAL LINKS</h3>
                            <ul class="lik">
                                <li>
                                    <a href="#"></a>
                                </li>
                                <li> <a href="http://www.ntu.edu.vn/">Nha Trang university</a></li>
                                <li> <a href="./profile.html">Profile</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="contact">
                            <h3>About NTU</h3>
                            <span>NTU was established as, and continues to be, a leading institution for education and
                                training
                                at undergraduate and postgraduate
                                levels for the fisheries sector and other related industries of Vietnam. </span>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="contact">
                            <h3>NTU</h3>
                            <span>Having established a strong foundation in fisheries and aquaculture, NTU is now
                                developing
                                into a multi-level and multi-discipline university in order to provide qualified human
                                resources to meet the needs of the industrialization and modernization of
                                Vietnam.</span>

                        </div>
                    </div>


                </div>
            </div>
            <div class="copyright">

                <p>© 2020 Trường Đại học Nha Trang</p>
            </div>

        </div>
    </footer>
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/plugin.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });

            $(".zoom").hover(function() {

                $(this).addClass('transition');
            }, function() {

                $(this).removeClass('transition');
            });
        });
    </script>
</body>

</html>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Kết quả phép tính</title>
    <style>
        form {
            width: auto;
            height: auto;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>

<body>

    <?php

    function pheptinh($pt, $a, $b)
    {
        if ($pt == '+') {
            return $a + $b;
        } else if ($pt == '-') {
            return $a - $b;
        } else if ($pt == '*') {
            return $a * $b;
        } else if ($pt == '/') {
            if ($b != 0) {
                return $a / $b;
            } else {
                // echo 'Khong the chia cho 0';
                return -404444444444444444444444;
            }
        }
    }

    if (isset($_POST['tinhtoan']))
        $kq = trim($_POST['tinhtoan']);
    else $kq = 0;

    if (isset($_POST['sothunhat']))
        $a = trim($_POST['sothunhat']);
    else $a = 0;

    if (isset($_POST['sothuhai']))
        $b = trim($_POST['sothuhai']);
    else $b = 0;

    
    $pt = $_POST['pheptinh'];
    $kq = 0;
    switch ($pt ) {
        case ('+'):
            $kq = pheptinh($pt, $a, $b);
            $pt = "Cộng";
        break;
        case ('-'):
            $kq = pheptinh($pt, $a, $b);
            $pt = "Trừ";
        break;
        case ('*'):
            $kq = pheptinh($pt, $a, $b);
            $pt = "Nhân";
        break;
        case ('/'):
            $kq = pheptinh($pt, $a, $b);
            $pt = "Chia";
        break;
    }
    
    ?>


    <form align='center' action="" method="post">
        <table border="0">
            <tr>
                <th colspan="2" align="center">
                    <h3>
                        <font color="aqua">PHÉP TÍNH TRÊN HAI SỐ</font>
                    </h3>
                </th>
            </tr>

            <tr>
                <td style="color: red">Chọn phép tính:
                    <?php echo $pt; ?>
                </td>
            </tr>

            <tr>
                <td style="color: blue">Số 1:</td>
                <td><input type="text" name="sothunhat" value="<?php echo $a; ?> " /></td>
            </tr>

            <tr>
                <td style="color: blue">Số 2:</td>
                <td><input type="text" name="sothuhai" value="<?php echo $b; ?> " /></td>
            </tr>

            <tr>
                <td style="color: blue">Kết quả:</td>
                <td><input type="text" name="tinhtoan" value="<?php echo $kq; ?> " /></td>
            </tr>

            <tr>
                <td colspan="2" align="center">
                    <a href="javascript:window.history.back(-1);" style="color: purple;">Trở về trang trước đó</a>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>