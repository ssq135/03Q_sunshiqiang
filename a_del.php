<?php 
header("content-type:text/html;charset=utf8");

mysql_connect('127.0.0.1','root','root');
mysql_select_db('ccc');
mysql_query('set names utf8');

$id = $_GET['id'];
$id = rtrim($id,',');

$mql = "DELETE FROM cccd WHERE id IN($id)";

$red = mysql_query($mql);


if ($red) {
	echo 1;
}else{
	echo 2;
}





?>