<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>显示</title>
</head>
<body>
	<center>
	<input type="text" id="search"><button onclick="yemian(1)">搜索</button>
	     <a href="tj.php"><input type="submit" value="添加"></a>
		<table border="1">
			<thead>
				<tr>
					<th></th>
					<th>id</th>
					<th>姓名</th>
					<th>年龄</th>
					<th>头像</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody id="tbody">
				
			</tbody>
		</table>



	每页:	<select  id="tiao" onchange="yemian(1)">
			<option value="5">5条</option>
			<option value="10">10条</option>
			<option value="15">15条</option>
			<option value="20">20条</option>
	</select>




<button onclick="j_all(true)">全选</button>
<button onclick="js_all()">反选</button>
<button onclick="j_all(false)">全不选</button>
b


</center>
</body>
<script>


	window.onload =  function(){
		yemian(1)
	}

	function yemian(page){

		var search = document.getElementById('search').value

		var tiao = document.getElementById('tiao').value


		var xhr= new XMLHttpRequest();

		xhr.open('get','a_show.php?page='+page+'&search='+search+'&tiao='+tiao);
		xhr.send(null);
		xhr.onreadystatechange = function(){
			if (xhr.readyState == 4 && xhr.status == 200){
				document.getElementById('tbody').innerHTML = xhr.responseText
			}
		}
	}

	function js_del(id,page){
		if (confirm('您确定要删除吗')) {
		var xhr= new XMLHttpRequest();
		xhr.open('get','a_del.php?id='+id);
		xhr.send(null);
		xhr.onreadystatechange = function(){
			if (xhr.readyState == 4 && xhr.status == 200){
				if (xhr.responseText==1){
					yemian(page)
				}else{
						alert('删除成功');
					}
				}
			}
		}
	}

	function del_all(page){
		if (confirm('您确定要删除吗')){
		var box = document.getElementsByName('box')
		var ids='';
		for(var i=0;i<box.length;i++){
			if(box[i].checked==true){
				ids+=box[i].value+','
			}
		}
		var xhr= new XMLHttpRequest();
		xhr.open('get','a_del.php?id='+ids);
		xhr.send(null);
		xhr.onreadystatechange = function(){
			if (xhr.readyState == 4 && xhr.status == 200){
				if (xhr.responseText==1){
					yemian(page)
				}else{
					alert('删除成功');
				}
			}
		}

		}


	}
	function js_go(){
		var go = document.getElementById('go').value
		yemian(go)
	}
	function j_all(is){
		var box = document.getElementsByName('box')
		for(var i=0;i<box.length;i++){
			box[i].checked=is
		}
	}
	function js_all(){
		var box = document.getElementsByName('box')
		for(var i=0;i<box.length;i++){
			if (box[i].checked==true) {
					box[i].checked=false
			}else{
				box[i].checked=true
			}
		}
	}
</script>
</html>