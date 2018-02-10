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
<body >
  <header class="header" id="header">
    <!--header-start-->
    <div class="container">
      <h1 class="animated fadeInDown delay-07s">Welcome To My Library</h1>
      
    </div>
  </header> 



<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';

  // it will never let you open index(login) page if session is set
 if ( isset($_SESSION['user'])!="" ) {
  header("Location: home.php");
  exit;
 }

  $error = false;

 if( isset($_POST['btn-login']) ) {

  // prevent sql injections/ clear user invalid inputs
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);

  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);

  // prevent sql injections / clear user invalid inputs

  if(empty($email)){
   $error = true;
   $emailError = "Please enter your email address.";
  } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  }

   if(empty($pass)){
   $error = true;
   $passError = "Please enter your password.";
  }

  // if there's no error, continue to login
  if (!$error) {
   $password = hash('sha256', $pass); // password hashing using SHA256
   $res=mysqli_query($conn, "SELECT userId, userName, userPass FROM users WHERE userEmail='$email'");
   $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
   $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row

   if( $count == 1 && $row['userPass']==$password ) {
    $_SESSION['user'] = $row['userId'];
    header("Location: home.php");
   } else {
    $errMSG = "Incorrect Credentials, Try again...";
   }
  }
 }

?>

    <div class="container" >
      <div class="row">
        <div class="col-lg-12 col-sm-6 wow fadeInLeft delay-05s">
          <div class="login-list">
             <form class="text-center" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off" >
              <img src="login.jpg" alt="" width="200px" height="200px" style="border-radius: 50%">
             <h2>Sign In.</h2>
             <hr />
                <?php
                if ( isset($errMSG) ){
                echo $errMSG; ?>
                  <?php
                   }
                   ?>
             <input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />

             <span class="text-danger"><?php echo $emailError; ?></span>

             <input  type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
       
            <span class="text-danger"><?php echo $passError; ?></span>
             <hr />

             <button class="btn btn-block btn-primary" class="btn btn-default" type="submit" name="btn-login">Sign In</button>

             <hr />
             <a class="btn btn-block btn-primary"  href="register.php">Sign Up Here...</a>
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

