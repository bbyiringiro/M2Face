<?php
session_start();
require_once 'include/classes/requests.class.php';

$request=new handler();
if (isset($_GET['user']))
	$request->sendrequest($_GET['user']);

$sql='select * from users';
$users=$request->query($sql);
while($row=$users->fetch()):
if ($row['uid']==$_SESSION['userid'])
	continue;
?>
<a href='members.php?user=<?php echo $row['uid']?>'><?php echo $row['username']?></a>
<?php endwhile;?>

