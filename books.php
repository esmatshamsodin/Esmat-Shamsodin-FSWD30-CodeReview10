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
	<link rel="stylesheet" href="style.css" type="text/css">
	
	<link rel="stylesheet" href="mystyle.css" type="text/css">

	



</head>
<body>
<header class="header" id="header">
		<!--header-start-->
		<div class="container">
			<h1 class="animated fadeInDown delay-07s">Welcome To My Library</h1>

				<?php
				 ob_start();
				 session_start();

				 require_once 'dbconnect.php';

				 // if session is not set this will redirect to login page
				 if( !isset($_SESSION['user']) ) {
				  header("Location: index.php");
				  exit;
				 }

				 // select logged-in users detail
				 $res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
				 $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
				?>

				           <h2 id="text">Hi <?php echo $userRow['userName']; ?> WellCome ^__^.</h2>
				 
               <a class="btn btn-primary btn-md" href="logout.php?logout">Sign Out</a>
		</div>
	</header>	

<!--Biglist section-->
<section class="main-section paddind" id="Biglist">
		<!--main-section-start-->
		<div class="container">
			<h2 class="text-center">Choose What you'r looking for</h2>
			
			<div class="bl">
				<ul class="Portfolio-nav wow fadeIn delay-02s">

					<li><a href="#Biglist" data-filter="*" class="current">AllMedia</a></li>
					<li><a href="books.php" data-filter=".branding">BOOKs</a></li>
					<li><a href="dvd.php" data-filter=".webdesign">DVDs</a></li>
					<li><a href="cd.php" data-filter=".printdesign">CDs</a></li>
					<li><a href="publisher.php" data-filter=".printdesign">Publisher</a></li>
				</ul>
			</div>

		</div>

		
	<!--main-section-end-->
	<h1 class="text-center">Books</h1>
			<?php
$servername = "localhost";
$username   = "root";
$password   = ""; 
$dbname     = "cr10_esmat_shamsodin_Biglibrary";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error() . "\n");
}
$sql = "SELECT * FROM media";
	
	$result = mysqli_query($conn, $sql);
?>
		<!--main-section-start-->

<table>
	
	<tbody>
		<?php 
			while ($row = mysqli_fetch_assoc($result)) {

				echo 
					" 
				
						<div class='text-center'".$row["media_id"]."<br>
						 <img id='bl' src='".$row["picture"]."'>.<br>"
						
						.$row["name"]."<br>
						
							".$row["description"]."<br>
						
						".$row["type"]."<br>
						<hr></div>
					";
					if($row["media_id"]==4){break;}
			};
		?>
	</tbody>
</table>
</section>
</body>
</html>

<?php ob_end_flush(); ?>

