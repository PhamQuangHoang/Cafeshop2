<?php session_start();
 require_once 'config.php';
	$config = new Config;
	// $result = $config->selectData('select * from type_drink');
  function alert($msg){
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }
//modals.php
if(isset($_POST['typename'])){
  die(json_encode(array("value"=>$_POST['typename'], "value2"=>$_POST['typeid'])));
}

if(isset($_POST['addType']) && ($_POST['addType'] != '')){
  $result = $config->selectSingle('select * from type_drink where type_name = "'.$_POST['addType'].'"');
  if(!$result){
    $config->IDU("INSERT INTO `type_drink` (`type_id`, `type_name`) VALUES (NULL, '".$_POST['addType']."')");
    die('true');
  }else{
    die('false');
  }
}
if(isset($_POST['deleteType'])){
  $result = $config->selectSingle('select * from type_drink where type_name = "'.$_POST['deleteType'].'"');
  if($result){
    $config->IDU("DELETE FROM `type_drink` WHERE type_name = '".$_POST['deleteType']."'");
    die('true');
  }else{
    die('false');
  }
}
if(isset($_POST['changeType']) && ($_POST['changeType'] != '')){
  if($_POST['changeTypeID'] === ''){
    die('Please select a type to change!');
  }
  $result = $config->selectSingle('select * from type_drink where type_name = "'.trim($_POST['changeType']).'"');
  if(!$result){
    $config->IDU("UPDATE type_drink SET type_name = '".trim($_POST['changeType'])."' WHERE type_id = ".$_POST['changeTypeID']);
    die('true');
  }else{
    die('Type is already exist, Please input another type name');
  }
}
//modal2
if(isset($_POST['drinkname'])){
  die(json_encode(array("value"=>$_POST['drinkname'], "value2"=>$_POST['drinkID'])));
}

//resource.php
if(isset($_POST['typeid'])){
  $typeid =$_POST['typeid'];
  $output ='';



		$result_right = $config->selectData('select * from resources where type_id = '. $typeid);

		foreach ($result_right as $rows_right) {

	$output .='<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 menu-right"> '. $rows_right['src_name'] .' </div>
	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 menu-right">
		 '. $rows_right['src_id'] .'
	</div>
	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 menu-right">
		 '. $rows_right['unit'] .'
	</div>
	<div class="col-lg-2 col-md-3 col-sm-3 col-xs-4 menu-right">
		'.  $rows_right['buy_price'] .'
	</div>
	<div class="col-lg-3 col-md-2 col-sm-2 col-xs-4 menu-right">
		'.  $rows_right['quantity'].'
	</div>



	' ;




	}
	die($output);
}

if(isset($_POST['datatable'])){

//  $array = $_POST['datatable'];
if("" == trim($_POST['joindate'])){
    echo "empty";
}  else {

  $table = $_POST['datatable'];
  $ban = "ban".$_POST['ban'];
  $joindate = $_POST['joindate'];
  $bill = $_POST['bill'];

  $array = array("datajoin" =>$joindate , "table"=>$table,"bill"=>$bill);
  json_encode($array);
  setcookie($ban, serialize($array), time()+86400 ,"/");
  echo"set thanh cong";
}

// echo $array[0]['ST'];

}

if(isset($_POST['tableid'])){
  	$tableid = $_POST['tableid'];
  	if(isset($_COOKIE[$tableid])){
  	$data = unserialize($_COOKIE[$tableid]);

     echo json_encode($data);
   }else {
     echo "empty";
   }
}

if(isset($_POST['destroyban'])){
$cc = $_POST['destroyban'];
  setcookie($cc, '', 1, "/");
   setcookie("ghep".$cc, '', 1, "/");
unset($_COOKIE[$cc]);
unset($_COOKIE["ghep".$cc]);

  echo "Hủy thành công";
}

if(isset($_POST['action'])){
    $action = $_POST['action'];
    $newbat =$_POST['newbat'];
    $oldbat =$_POST['oldbat'];
    if($newbat == $oldbat){
      die("Không thể thực hiện trên cùng 1 bàn ");
    }
    if($action =="Chuyển bàn"){
      $data = unserialize($_COOKIE[$oldbat]);
      setcookie($newbat, serialize($data), time()+86400 ,"/");
      setcookie($oldbat, '', 1, "/");
      unset($_COOKIE[$oldbat]);

      echo("Đã chuyển từ ".$oldbat. " sang " .$newbat);
    }
    if($action =="Ghép bàn"){
      if(!isset($_COOKIE[$newbat])){
        echo $newbat. " chưa khởi tạo ";
      }else {
        $dataold = unserialize($_COOKIE[$oldbat]);
        $datanew = unserialize($_COOKIE[$newbat]);
        json_encode($dataold);
        json_encode($datanew);

        $num = intval($dataold['bill']) + intval($datanew['bill']);
        $result = "Ghép bàn ".str_replace("ban","",$oldbat)." và  bàn ".str_replace("ban","",$newbat)." / Tổng tiền: ".$num;
        setcookie("ghep".$oldbat, $result, time()+86400 ,"/");
        setcookie("ghep".$newbat, $result, time()+86400 ,"/");
        echo $result;



    }
  }
    if("" == trim($action)){
        echo "404 not found";
    }

}


 ?>
