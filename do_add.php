<?php 
header("content-type:text/html;charset=utf-8");
@mysql_connect('127.0.0.1','root','root');
mysql_select_db('ccc');
mysql_query('set names utf8');

$c_name = $_POST['c_name'];
$c_age = $_POST['c_age'];
// $u_tel = $_POST['u_tel'];
// $time=date('Y-m-d H:i:s',time());
$file=$_FILES['file'];
if($file['error']==0){
	$path='./img/'.$file['name'];
	move_uploaded_file($file['tmp_name'],$path);
}

$sql = "insert into cccd(c_name,c_age,path) values('$c_name','$c_age','$path')";
// var_dump($sql);die;
$res = mysql_query($sql);

if($res){
	echo 'OK';
	header("refresh:2;ajax.php");
}else{
	echo 'error';
	header("refresh:2;ajax.php");
}


 ?>