<?php
session_start();
include 'templates/db-con.php';

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$Fname = $_POST['fname'];
$Lname = $_POST['lname'];
$Contact = $_POST['contact'];
$Email = $_POST['email'];
$Uname = $_POST['uname'];
$Pwd = $_POST['pwd'];
$Role = $_POST['role'];

$sql = "UPDATE person SET fname = '$Fname', lname = '$Lname', contact = '$Contact', email = '$Email', pwd = '$Pwd', role = '$Role' where user_id = '$Uname'";

if (mysqli_query($conn, $sql)) {
    echo "Profile Updated Successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
if($_SESSION['role']=='admin')
	header("Location: admin_view.php");
else
	header("Location: profile_view.php");
?>