<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/me2fac/include/classes/db.class.php';
$getfriends=new DbAccess();
session_start(); 
if (!$_SESSION['userid']) die; // Don't give the list to anybody not logged in 
$sql="select username,seen from users where seen > NOW()-60";
$users = $getfriends->query($sql);
$output = "<ul>"; 
while($row=$users->fetch())
{
$output .= "<li>".$row["username"]."</li>"; 
} 
$output .= "</ul>"; 
print $output; 
?>