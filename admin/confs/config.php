<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "1998";
$dbname = "store";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
mysqli_select_db($conn, $dbname);

?>