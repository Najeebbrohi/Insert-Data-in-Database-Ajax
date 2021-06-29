<?php

$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'insertajax');

extract($_POST);

if(isset($_POST['TimeIn']))
{
	$insert = "INSERT INTO attendance(timein,timeout,remarks) VALUES('$timein',Null,'$remarks')";

	$query = mysqli_query($con,$insert);

	header('location:insert.php');
}




if(isset($_POST['TimeOut']))
{
	$insert = "INSERT INTO attendance(timein,timeout,remarks) VALUES(Null,'$timeout','$remarks')";

	$query = mysqli_query($con,$insert);

	header('location:insert.php');
}




?>