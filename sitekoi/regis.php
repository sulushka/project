<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tispace";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect) {
	die("Connection failed: " . $conn->connect_error);
}

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$pwd=$_POST['pwd'];
$email=$_POST['email'];

$sql = "INSERT INTO accounts (fname, lname, pwd, email)
VALUES ('$fname', '$lname', '$pwd', '$email')";

if($conn->query($sql) === TRUE){
	echo "Successfully registered";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
	}
$conn->close();
?>