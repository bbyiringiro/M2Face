<?php 
include_once '../include/db.php';
session_start(); 
if ($_SESSION['userid']) 
{
$update=$db->prepare("UPDATE users SET seen = NOW() WHERE uid =?");
$update->execute(array($_SESSION['userid']));

}

?>