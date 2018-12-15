<?php session_start();
 require_once 'config.php';
	$config = new Config;
	// $result = $config->selectData('select * from type_drink');
//modals.php
if(isset($_POST['typename'])){
  die($_POST['typename']);
  
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
