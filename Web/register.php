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
	<title>Register</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="author" content="">
	<style>
		body {
			font-family: Arial, Helvetica, sans-serif;
			background-color: black;
		}

		* {
			box-sizing: border-box;
		}

		/* Add padding to containers */
		.container {
			padding: 16px;
			background-color: white;
		}

		/* Full-width input fields */
		input[type=text],
		input[type=password] {
			width: 100%;
			padding: 15px;
			margin: 5px 0 22px 0;
			display: inline-block;
			border: none;
			background: #f1f1f1;
		}

		input[type=text]:focus,
		input[type=password]:focus {
			background-color: #ddd;
			outline: none;
		}

		/* Overwrite default styles of hr */
		hr {
			border: 1px solid #f1f1f1;
			margin-bottom: 25px;
		}

		/* Set a style for the submit button */
		.registerbtn {
			background-color: #4CAF50;
			color: white;
			padding: 16px 20px;
			margin: 8px 0;
			border: none;
			cursor: pointer;
			width: 100%;
			opacity: 0.9;
		}

		.registerbtn:hover {
			opacity: 1;
		}

		/* Add a blue text color to links */
		a {
			color: dodgerblue;
		}

		/* Set a grey background color and center the text of the "sign in" section */
		.signin {
			background-color: #f1f1f1;
			text-align: center;
		}
	</style>
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
								<a href="index.html"><img src="images/logo.jpg" alt="logo" style="width: 50%;" /></a>
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

									<li class="mean-last"> <a href="register.php">signup</a> </li>

								</ul>
							</nav>
						</div>
					</div>
				</div>
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
					<li><a class="buy" href="./login.php">Login</a></li>
				</div>
			</div>
		</div>
		<!-- end header inner -->
	</header>
	<form action="/action_page.php">

  
  <div class="container signin">
    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
  </div>
</form>
	<!-- end header -->
	<?php # Script 9.5 - register.php #2
	// This script performs an INSERT query to add a record to the users table.

	$page_title = 'Register';

	// Check for form submission:
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		require('../demo.php'); // Connect to the db.

		$errors = array(); // Initialize an error array.

		// Check for a first name:
		if (empty($_POST['first_name'])) {
			$errors[] = 'You forgot to enter your first name.';
		} else {
			$fn = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
		}

		// Check for a last name:
		if (empty($_POST['last_name'])) {
			$errors[] = 'You forgot to enter your last name.';
		} else {
			$ln = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
		}

		// Check for an email address:
		if (empty($_POST['email'])) {
			$errors[] = 'You forgot to enter your email address.';
		} else {
			$e = mysqli_real_escape_string($dbc, trim($_POST['email']));
		}

		// Check for a password and match against the confirmed password:
		if (!empty($_POST['pass1'])) {
			if ($_POST['pass1'] != $_POST['pass2']) {
				$errors[] = 'Your password did not match the confirmed password.';
			} else {
				$p = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
			}
		} else {
			$errors[] = 'You forgot to enter your password.';
		}

		if (empty($errors)) { // If everything's OK.

			// Register the user in the database...

			// Make the query:
			$q = "INSERT INTO users (first_name, last_name, email, pass, registration_date) VALUES ('$fn', '$ln', '$e', SHA1('$p'), NOW() )";
			$r = @mysqli_query($dbc, $q); // Run the query.
			if ($r) { // If it ran OK.

				// Print a message:
				echo '<h1>Thank you!</h1>
		<p>You are now registered. In Chapter 12 you will actually be able to log in!</p><p><br /></p>';
			} else { // If it did not run OK.

				// Public message:
				echo '<h1>System Error</h1>
			<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';

				// Debugging message:
				echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
			} // End of if ($r) IF.

			mysqli_close($dbc); // Close the database connection.

			// Include the footer and quit the script:
			include('includes/footer.html');
			exit();
		} else { // Report the errors.

			echo '<h1>Error!</h1>
		<p class="error">The following error(s) occurred:<br />';
			foreach ($errors as $msg) { // Print each error.
				echo " - $msg<br />\n";
			}
			echo '</p><p>Please try again.</p><p><br /></p>';
		} // End of if (empty($errors)) IF.

		mysqli_close($dbc); // Close the database connection.

	} // End of the main Submit conditional.
	?>
	<h1>Register</h1>
	<form action="register.php" method="post">
		<p>First Name: <input type="text" name="first_name" size="15" maxlength="20" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>" /></p>
		<p>Last Name: <input type="text" name="last_name" size="15" maxlength="40" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>" /></p>
		<p>Email Address: <input type="text" name="email" size="20" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" /> </p>
		<p>Password: <input type="password" name="pass1" size="10" maxlength="20" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>" /></p>
		<p>Confirm Password: <input type="password" name="pass2" size="10" maxlength="20" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>" /></p>
		<p><input type="submit" name="submit" value="Register" type="button" class="btn btn-dark"/></p>
	</form>



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
					<dir class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
						<div class="for_box">
							<i><img src="icon/1.png" /></i>
							<p>Development in PHP Is Less Time-consuming</p>
						</div>
					</dir>
					<dir class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
						<div class="for_box">
							<i><img src="icon/2.png" /></i>
							<p>PHP Code is Flexible and Integrative</p>
						</div>
					</dir>
					<dir class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
						<div class="for_box">
							<i><img src="icon/3.png" /></i>
							<p>PHP-based Services are Easily Scalable and Well-documented</p>
						</div>
					</dir>
					<dir class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
						<div class="for_box">
							<i><img src="icon/4.png" /></i>
							<p>PHP Software is Easily Maintained and Updated</p>
						</div>
					</dir>
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
							<span>NTU was established as, and continues to be, a leading institution for education and training
								at undergraduate and postgraduate
								levels for the fisheries sector and other related industries of Vietnam. </span>
						</div>
					</div>

					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
						<div class="contact">
							<h3>NTU</h3>
							<span>Having established a strong foundation in fisheries and aquaculture, NTU is now developing
								into a multi-level and multi-discipline university in order to provide qualified human
								resources to meet the needs of the industrialization and modernization of Vietnam.</span>

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