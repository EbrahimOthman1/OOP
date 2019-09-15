<?php
include "db.php";

class DataOperation extends Database
{
	public function insert_record($table ,$fileds){
		$sql = "";
		//insert into books(title , rate , description) values ('title','rate');
		$sql .= "INSERT INTO " .$table;
		$sql .= "(".implode(",", array_keys($fileds)).") VALUES ";
		$sql .= "('".implode("','", array_values($fileds))."')";
		$query = mysqli_query($this->con,$sql);
		if($query){
			return true;
			}
		}
		public function fetch_record($table){
			$sql = "SELECT * FROM " . $table;
			$array = array();
			$query = mysqli_query($this->con,$sql);
			while($row = mysqli_fetch_assoc($query)){
				$array[] = $row;
			}
			return $array;
		}
		public function select_record($table,$where){
			 $sql = "";
			 $condition = "";
			 foreach ($where as $key => $value) {
			 		//id = 5 and title ='some thing'
			 	$condition .= $key . "='" .$value . "' AND ";
			 }

			 $condition = substr($condition ,0 ,-5);
			 $sql .= "SELECT * FROM ".$table." WHERE ".$condition;
			 $query = mysqli_query($this->con,$sql);
			 $row = mysqli_fetch_array($query);
			 return $row;
		}
		public function update_record($table,$where,$fields){
			 $sql = "";
			 $condition = "";
			 foreach ($where as $key => $value) {
			 		//id = 5 and title ='some thing'
			 	$condition .= $key . "='" .$value . "' AND ";
			 }
			 $condition = substr($condition, 0, -5);
			 foreach ($fields as $key => $value) {
			 	//UPDATE table SET title = '' , rate ='' WHERE id ='';
			 	$sql .= $key . "='".$value."', ";
			 }
			 $sql = substr($sql,0 , -2);
			 $sql = "UPDATE ".$table." SET ".$sql." WHERE ".$condition;
			 echo "$sql";
			 if (mysqli_query($this->con,$sql)){

			 	return true;

			 }

		}
		public function delete_record($table,$where){
			$sql = "";
			$condition = "";
			foreach ($where as $key => $value) {
			  $condition .= $key . "='" .$value . "' AND ";
			}
		    $condition = substr($condition, 0, -5).$value . "' AND ";
		    $sql = "DELETE FROM ".$table. " WHERE " .$condition;
		    echo "$sql";
		    if (mysqli_query($this->con,$sql)){

			 	return true;

			}

		}
}
$obj = new DataOperation;

if(isset($_POST["submit"])){
	$myarray = array(
		"title" => $_POST["title"],
		"rate" => $_POST["rate"],
	    "published_at" =>$_POST["published_at"],
	     "author_name" =>$_POST["author_name"],
	      "description" => $_POST["description"]
	  );
	if ($obj ->insert_record("books",$myarray)){
		header("location:home.php?msg=Record Inserted");
	}
}
  if(isset($_POST["update"])){
  	$id =$_POST["id"];
  	$where = array("id"=>$id);
  	$myarray = array(
		"title"         => $_POST["title"],
		"rate"          => $_POST["rate"],
	    "published_at"  => $_POST["published_at"],
	    // "author_name"   => $_POST["author_name"],
	    "description"   => $_POST["description"]
	  );
  	if($obj->update_record("books",$where,$myarray)){
  		header("location: home.php");

  	}
  	if (isset($_GET["delete"])){
  		$id = $_GET["id"] ?? null;
  		$where = array("id"=>$id);
  	if($obj->delete_record("books",$where)){
  		header("location: home.php");

  		}



  	}

  }
 ?>