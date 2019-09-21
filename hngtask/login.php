<?php
include_once 'connect.php';

if (@$_POST['submit']) {

	$myEmail = $_POST['email'];
	$myPassword = $_POST['password'];

	$sql = "SELECT * FROM loginuser WHERE email = '$myEmail' AND Password = '$myPassword' ";

	$outputMsg = 'LOGIN SUCCESSFUL!!';
	$outputMsg2 = 'LOGIN FAILED!!';


	$result = mysqli_query($connect, $sql) or die(mysqli_error($connect));

	$numOfRows = mysqli_num_rows($result);

	// if ($numOfRows > 0){
		// echo 'LOGIN SUCCESS ';
		// header("Location:https://victorphp.epizy.com/mainpage.php");
	// }
	// else {
		// echo "LOGIN FAILED";
	// }

}


?>





<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<!-- CSS LINK -->
	<link href="style.css" rel="stylesheet" type="text/css">
	<!-- END CSS LINK -->

	<!-- LIBRARIES -->
	<!-- |||||||||| -->

	<!-- Bootstrap -->
	<link href="libraries/css/bootstrap.min.css" rel="stylesheet">
	<script src="libraries/jquery-3.4.1.min.js"></script>
	<script src="libraries/js/bootstrap.min.js" rel="stylesheet"></script>
	<!-- end bootstrap -->

	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<!-- Animation -->
	<link href="libraries/aos/aos.css" rel="stylesheet">
	<script src="libraries/aos/aos.js" rel="stylesheet"></script>
	<!-- end animation -->

	<!-- |||||||||| -->
	<!-- END OF LIBRARIES -->

	<!-- ICON AND TITLE -->
	<title>Team Phoenix II</title>
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="" type="image/x-icon">
	<!-- END ICON AND TITLE -->

	<style>
	.fa {
		font-size: 23px;
		color: #003A8E;
		margin: 5px;
		margin-bottom: 20px;
	}
</style>
</head>
<body>
	<!--HOME-LOADER-->
	<div id="Home-loader">
		<img src="img/Home-loader.gif">
	</div>
	<!--  -->

	<!-- LOGIN PAGE -->
	<!-- |||||||||| -->

	<div class="container-fluid">
		<div class="row">

			<!-- Jumbotron -->
			<div class="col-xl-7 col-lg-7 d-none d-md-none d-lg-block">
				<div class="col-xl-12 pl-5" data-aos="fade-down" data-aos-duration="2000">
					<h1>Team<br> Phoenix II</h1>
				</div>
			</div>
			<!-- end jumbotron -->

			<!-- Right section -->
			<div class="col-xl-5 col-lg-5 col-md-12">
				<!-- Brand Logo  -->
				<div class="brand">
					<img src="" alt="logo" class="img-fluid">
				</div>
				<!-- end brand logo -->
				<!-- Login Form -- -->
				<form action="login.php" method="POST">

					<?php if (@$numOfRows > 0){ ?>
						<h4 class=" p-3 text-success font-weight-bold"><?php echo @$outputMsg ?></h4>
					<?php } else { ?> 
						<h4 class=" p-3 text-danger font-weight-bold"><?php echo @$outputMsg2 ?></h4>
					<?php    } ?>

					<h5><b>LOGIN</b></h5>
					<input type="email" name="email" placeholder="E-mail" required>
					<input type="password" name="password" placeholder="password" required>
					<div class="r_and_p">
						<input type="checkbox" name="checkbox" class="col-xl-6 align-middle">Remember me <span class="col-xl-6 ml-4 font-weight-bold"><a href="#">Forgot Password?</a></span>
					</div>
					<input type="submit" class="font-weight-bold" name="submit" value="LOGIN">
					<p class="font-weight-bold">If you dont have an account <a href="index.php"><u>SignUp</u></a></p>
				</form>
				<!-- end Login form -->

				<!--COMING SOON  -->
                <!--  <div class="coming_soon">
                    <p style="font-size: 40px;margin-bottom: 0px;color:gray;">Coming soon!</p>
                    <p style="font-size: 16px;">We are currently working very hard on <br> getting you a fantastic product.</p>
                    <a href="https://www.instagram.com/infomall_ng/"><i class="fa fa-facebook"></i></a>
                    <a href="https://www.instagram.com/infomall_ng/"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.instagram.com/studymate_ng/"><i class="fa fa-instagram"></i></a>
                </div> -->
                <!--  -->

                <!-- Footer -->
                <div class="form-photo col-xl-12 pl-5">
                	<!-- :Footer Image: -->
                	<img src="" alt="" class="img-fluid" style="max-width: 104%;">
                	<!--::-->
                </div>
                <!-- end form photo -->
                <!-- :Footer CopyRight -->
                <div class="footer">
                	<p>&copy; 2019 Team Phoenix II All Rights Reserved</p>  
                </div>
                <!--::-->
            </div>
            <!-- end right sectioin -->
        </div>
    </div>
    <!-- |||||||||| -->
    <!-- END LOGIN PAGE -->
</body>
<!-- JS LINK -->
<script src="style.js" rel="stylesheet"></script>
<script>
	AOS.init();
</script>
<!-- END JS LINK -->
</html>