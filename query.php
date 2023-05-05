<?php
session_start();

include 'sql.php';
if(isset($_POST['submit']))
{
	$first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $email = $_POST['u_email'];
    $mobile = $_POST['mobile'];
    $country = $_POST['country'];
    $website = $_POST['website'];
	$sql = "INSERT INTO user(first_name,last_name,email,mobile_number,country,website)VALUES('$first_name','$last_name','$email','$mobile','
    $country','$website')";
	$result = mysqli_query($conn,$sql);
    exec("php send_email.php > /dev/null &");
    header("location: success.php");
	exit;
}

header("location: index.php");
exit;
?>