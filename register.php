<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, maximum-scale=1">

  <title>CodeReview</title>

  <link href="bootstrap.css" rel="stylesheet" type="text/css">
  <link href="font-awesome.css" rel="stylesheet" type="text/css">
  <link href="responsive.css" rel="stylesheet" type="text/css">
  <link href="animate.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="mystyle.css" >


</head>
<body>
<header class="header" id="header">
    <!--header-start-->
    <div class="container">
      <h1 class="animated fadeInDown delay-07s">Welcome To My Library</h1>
    </div>
  </header> 

<?php

 ob_start();
 session_start(); // start a new session or continues the previous

 if( isset($_SESSION['user'])!="" ){
  header("Location: home.php"); // redirects to home.php
 }

 include_once 'dbconnect.php';

 $error = false;

 if ( isset($_POST['btn-signup']) ) {

  // sanitize user input to prevent sql injection
  $name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);

  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);

  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);

  // basic name validation
  if (empty($name)) {
   $error = true;
   $nameError = "Please enter your full name.";
  } else if (strlen($name) < 3) {
   $error = true;
   $nameError = "Name must have at least 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
   $error = true;
   $nameError = "Name must contain letters and spaces.";
  }

   //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  } else {

   // check whether the email exist or not
   $query = "SELECT userEmail FROM users WHERE userEmail='$email'";
   $result = mysqli_query($conn, $query);
   $count = mysqli_num_rows($result);
   if($count!=0){
    $error = true;
    $emailError = "Provided Email is already in use.";
   }
  }

  // password validation
  if (empty($pass)){
   $error = true;
   $passError = "Please enter password.";
  } else if(strlen($pass) < 6) {
   $error = true;
   $passError = "Password must have at least 6 characters.";
  }

  // password encrypt using SHA256();
  $password = hash('sha256', $pass);

  // if there's no error, continue to signup
  if( !$error ) {

   $query = "INSERT INTO users(userName,userEmail,userPass) VALUES('$name','$email','$password')";
   $res = mysqli_query($conn, $query);

   if ($res) {
    $errTyp = "success";
    $errMSG = "Successfully registered, you may login now";
    unset($name);
    unset($email);
    unset($pass);
   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later...";
    }
  }
 }

?>

 <div class="container">
      <div class="row">
        <div class="col-lg-12 col-sm-6 wow fadeInLeft delay-05s">
          <div class="login-list">

    <form class="text-center" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
            <img src="signup.png" alt="" width="200px" height="200px" style="border-radius: 40%">
             <h2>Sign Up.</h2>
             <hr />
                  <?php
                    if ( isset($errMSG) ) { 
                  ?>
                   <div class="alert">

                   <?php echo $errMSG; ?>
                    </div>
                   <?php
                 }
                    ?>
    
    <input class="form-control" type="text" name="name" class="form-control" placeholder="Enter Name" maxlength="50" value="<?php echo $name ?>" />   
                <span class="text-danger"><?php echo $nameError; ?></span>
             <input class="form-control" type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
                <span class="text-danger"><?php echo $emailError; ?></span>
             <input class="form-control" type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />
                <span class="text-danger"><?php echo $passError; ?></span>
             <hr />
             <button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>
             <hr />
             <a class="btn btn-block btn-primary" href="login.php">Login in Here...</a>
    </form>
     </div>
</div>
            
          </div>
        </div>

      </div>
    </div>
   

</body>
</html>
<?php ob_end_flush(); ?>