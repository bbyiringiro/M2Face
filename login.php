<?php
header("location:home.php");
session_start();
$msg = '';

if(isset($_POST["login"]) && ($_POST["username"] != '') && ($_POST["pass"] != ''))
{
	require_once 'include/db.php';
	require_once 'include/functions.php';
	$name = cleanInput($_POST['username']);
	
	$pass =cleanInput($_POST['pass']);

	$check_email = Is_email($name);
	if($check_email)
	{
		// email & password combination
		$sql ="SELECT * FROM users WHERE email = ? AND password = ?";
	} else {
		// username & password combination
		$sql ="SELECT * FROM users WHERE username = ? AND password = ?"; 
	}
	$stmt=$db->prepare($sql);
	$stmt->execute(array($name,$pass));
	
	$rows = $stmt->rowCount();
	
	if($rows > 0){
		$res= $stmt->fetch(PDO::FETCH_ASSOC);
		$_SESSION['username'] = "Billy Jason";
		$_SESSION['userid'] =1;
		header("location:home.php");
	}
else
	$msg = "Invalid Login Credentials";
//if some field was not filled
 }else {
	$$msg = "Please Provide All Details";
	echo "c";
}
$_SESSION['error']=$msg;
?>