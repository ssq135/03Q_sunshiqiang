<?php 
header("content-type:text/html;charset=utf-8");
class Db{
	public function __construct($username,$pwd,$db){
		@mysql_connect('127.0.0.1',$username,$pwd,$tel,$verify);
		mysql_select_db($db);
		mysql_query('set names utf8');
	}

	public function adds($table,$data){ 
		$sql = "insert into $table (";
		$sql.= implode(",",array_keys($data));
		$sql.= ") values ( '";
		$sql.= implode(" ','",array_values($data));
		$sql.= " ')";
		return $this->getquery($sql);
	}

	public function get_all($table){
		$sql = "select * from $table";
		$res = $this->getquery($sql);
		while ($row = mysql_fetch_assoc($res)) {
			$arr[] = $row;
		}
		return $arr; 
	}

	public function dels($table,$id){
	      $sql = "delete from $table where id = '$id'";
	      return $this->getquery($sql);
	}

	public function update($table,$data,$id){
	      $str = "";
	      foreach($data as $key=>$val){
	          $str.=",".$key." = '".$val." '";
	      }
	      $str = substr($str,1);
	      $sql = "update $table set $str where id = '$id'";
	      return $this->getquery($sql);
	   }
	
    public function getquery($sql)
    {
        return mysql_query($sql);
    }

    public function get_one($table,$id){
    	$sql = "select * from $table where id=$id";
    	$info = mysql_query($sql);
    	$res = mysql_fetch_assoc($info);
    	return $res;
    }
}



 ?>