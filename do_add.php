<?php 
header("content-type:text/html;charset=utf-8");
require('./DbClass.php');
$data = $_POST;
$obj = new Db('root','root','test');
$info = $obj->adds('user',$data);
if($info){
	echo "<script>alert('添加成功');location.href='lists.php'</script>";
}else{
	echo "<script>alert('添加失败');location.href='add.php'</script>";
}

 ?>