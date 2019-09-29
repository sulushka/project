<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tispace";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect) {
	die("Connection failed: " . $conn->connect_error);
}

$email=$_POST['email'];
$pwd=$_POST['pwd'];

$email=strtoupper($email);

$sql = "SELECT * from accounts
		where upper(email)='$email' and pwd='$pwd'";

$rw = mysqli_query($conn,$sql);
$total_rows=mysqli_num_rows($rw);

if ( $total_rows> 0) {
	header("Location: heck.1.html");
} else {
	echo "Error: " . "Email/password incorrect";
}
$conn->close();
?>
