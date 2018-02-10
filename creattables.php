
<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "cr10_esmat_shamsodin_biglibrary";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error() . "\n");
}
// sql to create table
$sql = "CREATE TABLE media (
media_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
author_id_fk INT(6) NOT NULL,
publisher_id_fk INT(6) NOT NULL,
typee VARCHAR(50),
publishe_dat DATE,
description VARCHAR(100),
isbn_code INT(10),
statuss VARCHAR(50)
)";
if (mysqli_query($conn, $sql)) {
    echo "Table media created successfully" . "\n";
} else {
    echo "Error creating table: " . mysqli_error($conn) . "\n";
}
mysqli_close($conn);
?>
