<?php 
header("content-type:text/html;charset=utf-8");
require('./DbClass.php');
$id = $_GET['id'];
$obj = new Db('root','root','test');
$arr = $obj->get_one('user',$id);

 ?>
<form action="do_update.php" method="POST">
	<table>
		<tr>
			<td>出发地：</td>
			<input type="hidden" name="id" value="<?php echo $arr['id']?>">
			<td><input type="text" name="uname" value="<?php echo $arr['uname']?>" /></td>
		</tr>
		<tr>
			<td>目的地：</td>
			<td><input type="text" name="pwd" value="<?php echo $arr['pwd']?>" /></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="抢票" /><input type="reset" value="清空" /></td>
		</tr>
	</table>
</form>
