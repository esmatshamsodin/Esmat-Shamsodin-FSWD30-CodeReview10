<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php
$servername = "localhost";
$username   = "root";
$password   = ""; 
$dbname     = "cr10_esmat_shamsodin_biglibrary";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error() . "\n");
}

$sql = "SELECT user_id, lastname, firstname FROM media";
$result = mysqli_query($conn, $sql);
// fetch a next row (as long as there are some) into $row
while($row = mysqli_fetch_assoc($result)) {
        printf("ID=%s %s (%s)<br>",
                  $row["user_id"], $row["lastname"],$row["firstname"]);
 }
echo "Fetched data successfully\n";
// Free result set
mysqli_free_result($result);
// Close connection
mysqli_close($conn);
?>
</body>

</html>