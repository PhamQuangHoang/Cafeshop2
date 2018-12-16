<?php 

	class Config
	{
		public $conn;
		function __construct()
		{
			$this->conn = mysqli_connect('localhost','root','','admincafe');
			mysqli_set_charset($this->conn,'utf8');
		}
		
		function selectData($sql){
			$result_array = array();
			$query = mysqli_query($this->conn,$sql);
			while($rows = mysqli_fetch_assoc($query)){
				$result_array[] = $rows;
			}
			return $result_array;
		}
		function selectSingle($sql){
			return mysqli_fetch_assoc(mysqli_query($this->conn,$sql));
		}
		function IDU($sql){
			if(mysqli_query($this->conn,$sql) === TRUE){
				return true;
			}else{
				return false;
			}
		}
	}


 ?>