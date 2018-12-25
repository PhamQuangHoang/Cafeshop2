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
  $result = $config->selectSingle('select * from drink where drink_id = "'.$_POST['drinkID'].'"');
  die(json_encode(array("name"=>$_POST['drinkname'], "id"=>$_POST['drinkID'],"unit"=>$result['unit'],"quantity"=>$result['quantity'],"price"=>$result['price'])));
}
if(isset($_POST['modal2_type_name'])){
  if(strcmp($_POST['modal2_type_name'],'all') == 0){
    $results = $config->selectData('select * from drink');
    $string = "";
    foreach ($results as $drink) {
    $drinkx = '"'.$drink['drink_name'].'"';
    $drinkid = '"'.$drink['drink_id'].'"';
    $string .= "<a onclick='parseName(".$drinkx.",".$drinkid.")' class='col-md-12 col-lg-12 col-sm-6 col-xs-4 list-group-item'>".$drink['drink_name']."<span class='badge badge-secondary'>".$drink['quantity']."</span></a>";
    }
    die($string);
  }else{
    $id = $config->selectSingle('select type_id from type_drink where type_name = "'.$_POST['modal2_type_name'].'"');
    $results = $config->selectData('select * from drink where type_id = '.$id['type_id']);
    $string = ""; 
    foreach ($results as $drink) {
    $drinkx = '"'.$drink['drink_name'].'"';
    $drinkid = '"'.$drink['drink_id'].'"';
    $string .= "<a onclick='parseName4(".drinkx.",".$drinkid.")' class='col-md-12 col-lg-12 col-sm-6 col-xs-4 list-group-item'>".$drink['drink_name']."<span class='badge badge-secondary'>".$drink['quantity']."</span></a>";
    }
    die($string);
  }
  
}
if(isset($_POST['modal2SubmitType'])){

  switch ($_POST['modal2SubmitType']) {
    case 'add':
      $result = $config->selectSingle('select * from drink where drink_name = "'.$_POST['modal2_product_name'].'" OR drink_id = "'.$_POST['modal2_product_id'].'"');
      if(!$result){
        $id = $config->selectSingle('select type_id from type_drink where type_name = "'.$_POST['modal2_product_type'].'"');
        $config->IDU("INSERT INTO `drink` (`drink_id`, `type_id`, `drink_name`, `unit`, `price`, `quantity`) VALUES ('".$_POST['modal2_product_id']."', '".$id['type_id']."', '".$_POST['modal2_product_name']."', '".$_POST['modal2_product_unit']."', '".$_POST['modal2_product_price']."', '".$_POST['modal2_product_quantity']."');");
        die('true');
      }else{
        die('false');
      }
    break;
    case 'delete':
      $result = $config->selectSingle('select * from drink where drink_name = "'.$_POST['modal2_product_name'].'" AND drink_id = "'.$_POST['modal2_product_id'].'"');
      if($result){
        $config->IDU("DELETE FROM `drink` WHERE drink_name = '".$_POST['modal2_product_name']."' AND drink_id = '".$_POST['modal2_product_id']."'");
        die('true');
      }else{
        die('false');
      }
    break;
    case 'change':

      $result = $config->selectSingle('select * from drink where drink_id = "'.$_POST['modal2_product_id_old'].'"');
      if($result){
        $id = $config->selectSingle('select type_id from type_drink where type_name = "'.$_POST['modal2_product_type'].'"');
        $config->IDU("UPDATE `drink` SET `drink_id` = '".$_POST['modal2_product_id_new']."', `type_id` = '".$id['type_id']."', `drink_name` = '".$_POST['modal2_product_name']."', `unit` = '".$_POST['modal2_product_unit']."', `price` = '".$_POST['modal2_product_price']."', `quantity` = '".$_POST['modal2_product_quantity']."' WHERE `drink`.`drink_id` = '".$_POST['modal2_product_id_old']."'");
        die('true');
      }else{
        die('Change NOT SUCCESS, please check info. again!');
      }
    break;
  }
}
//modal4
if(isset($_POST['srcname'])){
  $result = $config->selectSingle('select * from resources where src_id = "'.$_POST['srcID'].'"');
  die(json_encode(array("name"=>$_POST['srcname'], "id"=>$_POST['srcID'],"unit"=>$result['unit'],"quantity"=>$result['quantity'],"price"=>$result['buy_price'])));
}
if(isset($_POST['modal4_type_name'])){
  if(strcmp($_POST['modal4_type_name'],'all') == 0){
    $results = $config->selectData('select * from resources');
    $string = "";
    foreach ($results as $resource) {
    $resourcex = '"'.$resource['src_name'].'"';
    $resourceid = '"'.$resource['src_id'].'"';
    $string .= "<a onclick='parseName(".$resourcex.",".$resourceid.")' class='col-md-12 col-lg-12 col-sm-6 col-xs-4 list-group-item'>".$resource['src_name']."<span class='badge badge-secondary'>".$resource['quantity']."</span></a>";
    }
    die($string);
  }else{
    $id = $config->selectSingle('select type_id from type_drink where type_name = "'.$_POST['modal4_type_name'].'"');
    $results = $config->selectData('select * from resources where type_id = '.$id['type_id']);
    $string = "";
    foreach ($results as $resource) {
    $resourcex = '"'.$resource['src_name'].'"';
    $resourceid = '"'.$resource['src_id'].'"';
    $string .= "<a onclick='parseName4(".$resourcex.",".$resourceid.")' class='col-md-12 col-lg-12 col-sm-6 col-xs-4 list-group-item'>".$resource['src_name']."<span class='badge badge-secondary'>".$resource['quantity']."</span></a>";
    }
    die($string);
  }
  
}
if(isset($_POST['modal4SubmitType'])){

  switch ($_POST['modal4SubmitType']) {
    case 'add':
      $result = $config->selectSingle('select * from resources where src_name = "'.$_POST['modal4_product_name'].'" OR src_id = "'.$_POST['modal4_product_id'].'"');
      if(!$result){
        $id = $config->selectSingle('select type_id from type_drink where type_name = "'.$_POST['modal4_product_type'].'"');
        $config->IDU("INSERT INTO `resources` (`src_id`, `type_id`, `src_name`, `unit`, `buy_price`, `quantity`) VALUES ('".$_POST['modal4_product_id']."', '".$id['type_id']."', '".$_POST['modal4_product_name']."', '".$_POST['modal4_product_unit']."', '".$_POST['modal4_product_price']."', '".$_POST['modal4_product_quantity']."');");
        die('true');
      }else{
        die('false');
      }
    break;
    case 'delete':
      $result = $config->selectSingle('select * from resources where src_name = "'.$_POST['modal4_product_name'].'" AND src_id = "'.$_POST['modal4_product_id'].'"');
      if($result){
        $config->IDU("DELETE FROM `resources` WHERE src_name = '".$_POST['modal4_product_name']."' AND src_id = '".$_POST['modal4_product_id']."'");
        die('true');
      }else{
        die('false');
      }
    break;
    case 'change':

      $result = $config->selectSingle('select * from resources where src_id = "'.$_POST['modal4_product_id_old'].'"');
      if($result){
        $id = $config->selectSingle('select type_id from type_drink where type_name = "'.$_POST['modal4_product_type'].'"');
        $config->IDU("UPDATE `resources` SET `src_id` = '".$_POST['modal4_product_id_new']."', `type_id` = '".$id['type_id']."', `src_name` = '".$_POST['modal4_product_name']."', `unit` = '".$_POST['modal4_product_unit']."', `buy_price` = '".$_POST['modal4_product_price']."', `quantity` = '".$_POST['modal4_product_quantity']."' WHERE `resources`.`src_id` = '".$_POST['modal4_product_id_old']."'");
        die('true');
      }else{
        die('Change NOT SUCCESS, please check info. again!');
      }
    break;
  }
}

//modal5

if(isset($_POST['modal5_type_name'])){
  if(strcmp($_POST['modal5_type_name'],'all') == 0){
    $results = $config->selectData('select * from resources');
    $string = "";
    foreach ($results as $resource) {
    $resourcex = '"'.$resource['src_name'].'"';
    $resourceid = '"'.$resource['src_id'].'"';
    $string .= "<div class='row table-bordered' onclick='parseName5(".$resourcex.",".$resourceid.")'><div class='col-lg-8 col-md-8 col-sm-8 col-xs-8'>
                <span class='text-justify text-center'>".$resource['src_name']."</span>
              </div>
              <div class='col-lg-4 col-md-4 col-sm-4 col-xs-4'>
                <span class='text-justify text-center'>".$resource['quantity']."</span>
              </div></div>";
    }
    die($string);
  }else{
    $id = $config->selectSingle('select type_id from type_drink where type_name = "'.$_POST['modal5_type_name'].'"');
    $results = $config->selectData('select * from resources where type_id = '.$id['type_id']);
    $string = "";
    foreach ($results as $resource) {
    $resourcex = '"'.$resource['src_name'].'"';
    $resourceid = '"'.$resource['src_id'].'"';
    $string .= "<div class='row table-bordered' onclick='parseName5(".$resourcex.",".$resourceid.")'><div class='col-lg-8 col-md-8 col-sm-8 col-xs-8 text-center'>
                <span class='text-justify'>".$resource['src_name']."</span>
              </div>
              <div class='col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center'>
                <span class='text-justify'>".$resource['quantity']."</span>
              </div></div>";
    }
    die($string);
  }
  
}

if(isset($_POST['modal5srcname'])){
  $result = $config->selectSingle('select * from resources where src_id = "'.$_POST['modal5srcID'].'"');
  die(json_encode(array("name"=>$_POST['modal5srcname'], "id"=>$_POST['modal5srcID'],"unit"=>$result['unit'],"quantity"=>$result['quantity'],"price"=>$result['buy_price'])));
}

if(isset($_POST['modal5_seller'])){
  $price = implode(", ",$_POST['modal5_src_price']);
  $quantity = implode(", ",$_POST['modal5_src_quantity']);
  $name = implode(", ",$_POST['modal5_src_name']);
  $config->IDU("INSERT INTO `nhapkho_detail` (`nk_id`, `nk_provider`, `nk_address`, `nk_number`, `src_price`, `src_quantity`, `src_name`, `nk_date`) VALUES (NULL, '".$_POST['modal5_seller']."', '".$_POST['modal5_seller_address']."', '".$_POST['modal5_seller_number']."', '".$price."', '".$quantity."', '".$name."', CURRENT_TIMESTAMP)");
  die('Nhập kho thành công !');
}
//modal6,6.1

if(isset($_POST['modal6_table_id'])){
  
  $details = $config->selectSingle('select * from nhapkho_detail where nk_id='.$_POST['modal6_table_id']);
  
  $tdtable = "<tr><td>".$details['nk_id']."</td><td>".$details['nk_provider']."</td><td>".$details['nk_address']."</td><td>".$details['nk_number']."</td><td>".$details['nk_date']."</td></tr>";
  $array_src_price = explode(", ",$details['src_price']);
  $array_src_quantity = explode(", ",$details['src_quantity']);
  $array_src_name = explode(", ",$details['src_name']);
  $tddetail = '';
  $sumprice = 0;
  for($i =0;$i<count($array_src_price);$i++) {
    $tddetail .= "<tr><td>".$array_src_name[$i]."</td><td>".$array_src_price[$i]/$array_src_quantity[$i]."</td><td>".$array_src_quantity[$i]."</td><td>".$array_src_price[$i]."</tr>";
    $sumprice += $array_src_price[$i];
  }
  die(json_encode(array("tdtable"=>$tdtable, "sumprice"=>$sumprice,"tddetail"=>$tddetail)));
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



// QLBAN SESSION

// bat dau button
if(isset($_POST['startorder'])){
 $sql = "UPDATE `frmtable` SET `status` = '1' , `controller`= '".$_POST['employee']."' WHERE `frmtable`.`tableID` = '".$_POST['startorder']."' ";
    if($config->IDU($sql)){
        echo $_POST['employee'];

    }


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
   $sql = "SELECT controller FROM `frmtable` WHERE `frmtable`.`tableID` = '".$_POST['ban']."'";
   $result =  $config->selectSingle($sql);
   $em = $result['controller'];

  $array = array("datajoin" =>$joindate , "table"=>$table,"bill"=>$bill,"employ"=>$em );
  json_encode($array,JSON_UNESCAPED_UNICODE);
  setcookie($ban, serialize($array), time()+86400 ,"/");

  $sql = "UPDATE `frmtable` SET `info`= '".serialize($array)."'  WHERE `frmtable`.`tableID` = '".$_POST['ban']."' ";
    if($config->IDU($sql)){
      echo "THEM THANH CONG";
    }

 

}

// echo $array[0]['ST'];

}

if(isset($_POST['tableid'])){
    $tableid = $_POST['tableid'];
    
    //$data = unserialize($_COOKIE[$tableid]);
     $sql = "SELECT * FROM `frmtable` WHERE `frmtable`.`tableID` = '".str_replace("ban","",$tableid)."'  ";
     $result =  $config->selectSingle($sql);
     if($result['info'] != ""){
      $data =unserialize($result['info']);
    
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

// Database 
    $sql = "UPDATE `frmtable` SET `status` = '0'  , `controller`= '',`info`=''  WHERE `frmtable`.`tableID` = '".str_replace("ban","",$cc)."' ";
    if($config->IDU($sql)){
      echo "Hủy thành công";
    }

  
}

if(isset($_POST['action'])){
    $action = $_POST['action'];
    $newbat =$_POST['newbat'];
    $oldbat =$_POST['oldbat'];
    $employee = $_POST['employee'];
    if($newbat == $oldbat){
      die("Không thể thực hiện trên cùng 1 bàn ");
    }
    if($action =="Chuyển bàn"){
      $data = unserialize($_COOKIE[$oldbat]);
      //chuyen data sang 
      setcookie($newbat, serialize($data), time()+86400 ,"/");
      $sql = "UPDATE `frmtable` SET `status` = '1'  , `controller`= '".$employee."',`info`= '".serialize($data)."'  WHERE `frmtable`.`tableID` = '".str_replace("ban","",$newbat)."' ";
    if($config->IDU($sql)){
      
    }
//huy data ban cu
      setcookie($oldbat, '', 1, "/");
       unset($_COOKIE[$oldbat]);
       $sql = "UPDATE `frmtable` SET `status` = '0'  , `controller`= '',`info`=''  WHERE `frmtable`.`tableID` = '".str_replace("ban","",$oldbat)."' ";
    if($config->IDU($sql)){
      
    }
     

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
