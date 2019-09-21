<?php
include_once "connect.php";


$firstName = mysqli_real_escape_string($connect, @$_POST["firstname"]);
$lastName = mysqli_real_escape_string($connect, @$_POST["lastname"]);
$email = mysqli_real_escape_string($connect, @$_POST["email"]);
$passWord = mysqli_real_escape_string($connect, @$_POST["password"]);
$passWord2 = mysqli_real_escape_string($connect,@$_POST["password2"]);

//VALIDATION
if (@$_POST["submit"]) {

  if (empty($firstName)) {
    $firstNameErr = true;
  }

  if (empty($lastName)) {
    $lastNameErr = true;
  }

  if (empty($email)) {
    $EmailErr = true;
  } else{
    //Checking if email exists in DB
    $sql = "SELECT * FROM loginuser WHERE email = '$email'  ";
    
    $result = mysqli_query($connect, $sql) or die(mysqli_error($connect));
    
    $numOfRowsEmail = mysqli_num_rows($result);
    
    if ($numOfRowsEmail > 0)
    {
      $EmailExistErr = true;
    } 
  }
  
  if (empty($passWord)) {
    $PassErr = true;
  } 
  
  if (empty($passWord2)) {
    $ConfirmPassErr = true;

  } elseif (@$passWord != $passWord2) {
    $passMismatchErr = true;
  }
   
}

if (@$_POST['submit'] && !@$firstNameErr && !@$lastNameErr && !@$EmailErr && !@$EmailExistErr && !@$PassErr && !@$ConfirmPassErr && !@$passMismatchErr){
  $sql = "INSERT INTO loginuser (firstname, lastname, email, password, confirmpassword) VALUES ('$firstName', '$lastName', '$email', '$passWord', '$passWord2' )";
  
  $outputMsg = 'Registration Complete!!';
  
  $result = mysqli_query($connect, $sql) or die(mysqli_error($connect));
  
  // echo $outputMsg;
  
  header("Location: http://localhost/HNG-Task-1/login.php");
  
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
        <!-- Sign up Form -- -->
        <form action="" method="POST">
          <h5><b>Signup</b></h5>

          <span class="error text-danger"> <?php if(@$firstNameErr)  { echo "Firstname's required"; } ?> </span>  
          <input type="text" name="firstname" placeholder="Enter Firstname">

          <span class="error text-danger"> <?php if(@$lastNameErr)  { echo "Lastname's required"; } ?> </span>  
          <input type="text" name="lastname" placeholder="Enter Lastname">

          <span class="error text-danger"> <?php if(@$EmailErr)  { echo "Email's required"; } ?> </span>
          <span class="error text-danger"> <?php if(@$EmailExistErr)  { echo "Email already exists"; } ?> </span>
          <input type="email" name="email" placeholder="Enter E-mail">

          <span class="error text-danger"> <?php if(@$PassErr)  { echo "Password's required"; } ?> </span>
          <span class="error text-danger"><?php if(@$passMismatchErr)  { echo "Passwords do not match"; } ?> </span>
          <input type="password" name="password" placeholder="Enter Password">

          <span class="error text-danger"><?php if(@$ConfirmPassErr)  { echo "Password's Required"; } ?> </span>
          <span class="error text-danger"><?php if(@$passMismatchErr)  { echo "Passwords do not match"; } ?> </span>
          <input type="password" name="password2" placeholder="Confirm Password">

          <input type="submit" class="font-weight-bold" name="submit" value="SIGN UP">
          <p class="font-weight-bold">Got an account already? <a href="login.php">Login</a></p>
        </form>
        <!-- end Signup form -->

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
          <p>&copy; 2019 Team Phoenix II All Rights Resered</p>  
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