<?php
define('DB_HOST', 'mysql:host=localhost;dbname=me2face');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

$db=new PDO(DB_HOST,DB_USER,DB_PASSWORD,array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
?>