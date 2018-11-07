<?php 
header("content-type:text/html;charset=utf-8");
require('./DbClass.php');
$obj = new Db('root','root','test');
$arr = $obj->get_all('user');
 ?>

 <center>	
 <a href="add.php"><input type="submit" value="添加" /></a>
 <table border="1">
 	<tr>
 		<td>id</td>
 		<td>出发地</td>
 		<td>目的地</td>
 		<td>3/21</td>
 		<td>3/22</td>
 		<td>操作</td>
 	</tr>
 	<?php foreach ($arr as $key => $value){  ?>	
 	<tr>
 		<td><?php echo $value['id']?></td>
 		<td><?php echo $value['uname']?></td>
 		<td><?php echo $value['pwd']?></td>
 		<td><?php echo $value['tel']?></td>
 		<td><?php echo $value['verify']?></td>
 		<td><a href="del.php?id=<?php echo $value['id']?>">删除</a>||<a href="update.php?id=<?php echo $value['id']?>">抢票</a></td>
 	</tr>
 	<?php }?>
 </table>
  </center>