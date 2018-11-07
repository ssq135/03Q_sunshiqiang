<?php 
header("content-type:text/html;charset=utf-8");
require('./DbClass.php');
$id = $_GET['id'];
$obj = new Db('root','root','test');
$info = $obj->dels('user',$id);
if($info){
	echo "<script>alert('删除成功');location.href='lists.php'</script>";
}else{
	echo "<script>alert('删除失败');location.href='lists.php'</script>";
}


 ?>