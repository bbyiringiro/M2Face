<?php
if(isset($_SESSION['userid'])){
		$sql=$dbh->prepare("UPDATE users SET seen=NOW() WHERE uid=?");
		$sql->execute(array($_SESSION['userid']));
	}else{
		$sql=$dbh->prepare("INSERT INTO chatters2 (name,seen) VALUES (?,NOW())");
		$sql->execute(array($_SESSION['user']));
	}
}
/* Make sure the timezone on Database server and PHP server is same */
$sql=$dbh->prepare("SELECT * FROM chatters2");
$sql->execute();
while($r=$sql->fetch()){
	$curtime=strtotime(date("Y-m-d H:i:s",strtotime('-25 seconds', time())));
	if(strtotime($r['seen']) < $curtime){
		$kql=$dbh->prepare("DELETE FROM chatters2 WHERE name=?");
		$kql->execute(array($r['name']));
	}
}