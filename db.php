<?php
class Database
{
	public $con;
	public function __construct(){
		$this->con =mysqli_connect("localhost","ebrahimotman","123","books");
		// if($this->con){
		// 	echo "connected";
		// }else{
		// 	echo "Not connected";
		// }
	}
}
$obj = new Database;
?>