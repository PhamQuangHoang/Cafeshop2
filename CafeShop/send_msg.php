<?php session_start();

include("config.php");
$con = new Connect("cafepage");
$path =$_SESSION['url'];

if(isset($_POST['send'])){
	$name =  mysqli_real_escape_string($con->conn,$_POST['custName']);
	$sdt =  mysqli_real_escape_string($con->conn,$_POST['phoneNO']);
	$email =  mysqli_real_escape_string($con->conn,$_POST['custEmail']);
	if(isset($_POST['countpp'])){
		$countPP =  mysqli_real_escape_string($con->conn,$_POST['countpp']);
	}else $countPP=" ";
	$message =  mysqli_real_escape_string($con->conn,$_POST['message']);
	$sql ="INSERT INTO `customeroder`(`customerID`, `customerName`, `customerEmail`, `phonenumber`, `deal`, `message`) VALUES (null,'".$name."','".$sdt."','".$email."','".$countPP."','".$message."')" ; 
	if($con->insert($sql)){
		header("location: ".$path.".php?success=1");
	}
}
?>