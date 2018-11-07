<?php 
header("content-type:text/html;charset=utf-8");
require('./DbClass.php');
$data = $_POST;
$id = $_POST['id'];
$obj = new Db('root','root','test');
$info = $obj->update('user',$data,$id);
if($info){
	echo "<script>alert('抢票成功');location.href='lists.php'</script>";
}else{
	echo "<script>alert('抢票失败');location.href='update.php'</script>";
}




 ?>