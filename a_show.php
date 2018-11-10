<?php 
header("content-type:text/html;charset=utf8");

@mysql_connect('127.0.0.1','root','root');
mysql_select_db('ccc');
mysql_query('set names utf8');
$search = $_GET['search'];
$ye=$_GET['tiao'];
$tato="SELECT COUNT(*) AS num FROM cccd WHERE c_name LIKE '%$search%'";
$tato_red = mysql_query($tato);
$tato_sql = mysql_fetch_assoc($tato_red);
$weiye = ceil($tato_sql['num']/$ye);





$page = $_GET['page'];
$pianyiliang = ($page-1)*$ye;
$mql = "SELECT * FROM cccd WHERE c_name LIKE '%$search%' LIMIT $pianyiliang,$ye";

$red = mysql_query($mql);

$data = array();

while ($arr = mysql_fetch_assoc($red)) {
	$data[] = $arr;
}


 ?>


<?php foreach ($data as $key => $value): ?>
	<tr>
		<td><input type="checkbox" name="box" value="<?php echo $value['id'] ?>"></td>


		<td><?php echo $value['id'] ?></td>


		<td><?php echo str_replace($search,"<font color='red'>".$search."</font>", $value['c_name']) ?></td>


		<td><?php echo $value['c_age'] ?></td>
		
       <td><img src="<?php echo $value['path'];?>" alt="加载失败" width="100"height="100"></td>
		
		<td><a href="javascript:void(0)" onclick="js_del(<?php echo $value['id'] ?>,<?php echo $page ?>)">删除</a></td>
	</tr>

<?php endforeach ?>
<td colspan="5"> 
当前第<font size="15" color="red"><?php echo $page?></font>页

<a href="javascript:void(0)" onclick="yemian(<?php echo 1 ?>)">首页</a>

<?php if ($page==1) {?>
	<a href="javascript:alert('已经是第一页了请不要再点了')">上一页</a>
<?php }else{ ?>
	<a href="javascript:void(0)" onclick="yemian(<?php echo $page-1 ?>)">上一页</a>
<?php } ?>
	
	<?php for($i=1;$i<=$weiye;$i++){?>
	<a href="javascript:void(0)" onclick="yemian(<?php echo $i ?>)"><?php echo $i ?></a>
	<?php } ?>





<?php if ($page==$weiye) {?>
	<a href="javascript:alert('已经是最后一页了请不要再点了')">下一页</a>
<?php }else{ ?>
	<a href="javascript:void(0)" onclick="yemian(<?php echo $page+1 ?>)">下一页</a>
<?php } ?>

<a href="javascript:void(0)" onclick="yemian(<?php echo $weiye ?>)">尾页</a>

共<font size="15" color="red"><?php echo $weiye?></font>页

<button onclick="del_all(<?php echo $page ?>)">批量删除</button>
<input type="text" style="width:40px" id="go"><button onclick="js_go()">go</button>

</td>
