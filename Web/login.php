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
    <title>Login</title>
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
                                    <li class="active"> <a href="index.html">Home</a> </li>
                                    <li> <a href="profile.html">Profile</a> </li>
                                    <li><a>exercise</a>
                                        <ul class="dropdown">
                                            <li><a href="form.html">From</a></li>
                                            <li><a href="file_stringarray.html">File String Array</a></li>
                                            <li><a href="oop.html">OOP</a></li>
                                            <li><a href="sql.html">SQL</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="contact.html">contact</a>
                                    </li>

                                    <li class="mean-last"> <a href="./register.php">signup</a> </li>

                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
                    <li><a class="buy" href="#">Login</a></li>
                </div>
            </div>
        </div>
        <!-- end header inner -->
    </header>
    <!-- end header -->
    <?php
    // Initialize the session
    session_start();

    // Check if the user is already logged in, if yes then redivect him to welcome page


    // Include config file
    require_once "config.php";

    // Define variables and initialize with empty values
    $username = $password = "";
    $username_err = $password_err = "";

    // Processing form data when form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Check if username is empty
        if (empty(trim($_POST["username"]))) {
            $username_err = "Please enter username.";
        } else {
            $username = trim($_POST["username"]);
        }

        // Check if password is empty
        if (empty(trim($_POST["password"]))) {
            $password_err = "Please enter your password.";
        } else {
            $password = trim($_POST["password"]);
        }

        // Validate credentials
        if (empty($username_err) && empty($password_err)) {
            // Prepare a select statement
            $sql = "SELECT id, username, password FROM users WHERE username = ?";

            if ($stmt = mysqli_prepare($link, $sql)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_username);

                // Set parameters
                $param_username = $username;

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    // Store result
                    mysqli_stmt_store_result($stmt);

                    // Check if username exists, if yes then verify password
                    if (mysqli_stmt_num_rows($stmt) == 1) {
                        // Bind result variables
                        mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                        if (mysqli_stmt_fetch($stmt)) {
                            if (password_verify($password, $hashed_password)) {
                                // Password is correct, so start a new session
                                if (!isset($_SESSION)) {
                                    session_start();
                                }

                                // Store data in session variables
                                $_SESSION["loggedin"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["username"] = $username;

                                // Redivect user to welcome page
                                header("location: profile.html");
                            } else {
                                // Display an error message if password is not valid
                                $password_err = "The password you entered was not valid.";
                            }
                        }
                    } else {
                        // Display an error message if username doesn't exist
                        $username_err = "No account found with that username.";
                    }
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close statement
                mysqli_stmt_close($stmt);
            }
        }

        // Close connection
        mysqli_close($link);
    }
    ?>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper {
            width: 350px;
            padding: 20px;
        }
    </style>

    <div class="wrapper col-md-3">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
    </div>
    <div class="col-md-9">
        <nav class="navbar bg-light">
            <section class="slider_section">
                <div id="main_slider" class="carousel slide banner-main" data-ride="carousel">

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="first-slide" src="images/banner2.jpg" alt="First slide">

                        </div>
                        <div class="carousel-item">
                            <img class="second-slide" src="images/banner2.jpg" alt="Second slide">

                        </div>
                        <div class="carousel-item">
                            <img class="third-slide" src="images/banner2.jpg" alt="Third slide">

                        </div>

                    </div>
                    <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
                        <i class='fa fa-angle-right'></i>
                    </a>
                    <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
                        <i class='fa fa-angle-left'></i>
                    </a>

                </div>

            </section>
        </nav>
    </div>


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
<?php
