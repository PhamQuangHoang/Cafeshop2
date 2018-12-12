<?php session_start();
include("config.php");
$con = new Connect('cafepage');
      if(isset($_POST['custName'])){
        $custName = $_POST['custName'];
        $custAddress = $_POST['custaddress'];
        $custEmail =$_POST['custemail'];
        $custphone = $_POST['custphone'];
        $custMsg = $_POST['custmessage'];
        $status = $_POST['status'];


        $total=0;
        for($i=0;$i<count($_SESSION['name']);$i++) {
         $price = str_replace(",", "", substr($_SESSION['price'][$i],0,6));;
         $qty  = $_SESSION['quantity'][$i];
         $size =$_SESSION['size'][$i];
         if($size == "size vừa(600ml)"){
           $price += 7000;
         }
         $subtotal = ($price * $qty);
         $total = ($total + $subtotal);

       $product[] = array("productname"=>$_SESSION['name'][$i], "productquantity"=>$qty,"productsize"=>$size);  

     }

     //
     // $arr = array('productName'=>$_SESSION['name'][$i],'productquantity'=>$qty,'total'=>$total,'productsize'=>$size );  

     $customer[] = array('name' => $custName,'email'=>$custEmail,'address'=>$custAddress,'phone'=>$custphone,'message'=>$custMsg );
     $arrcust = json_encode($customer);
     $arr = json_encode($product,JSON_UNESCAPED_UNICODE);
     $merger=json_encode(array_merge(json_decode($arrcust, true),json_decode($arr, true)),JSON_UNESCAPED_UNICODE);
     
     
     
      // setcookie( $custName, $merger,time() + (86400 * 30), "/");
     // echo $merger[0]->name;

      // decode de~ lay' giu~ lieu object
// $merger=json_decode($merger);


//      for ($i=1;$i<sizeof($merger);$i++) {
//          echo $merger[$i]->productname;
// }   
     $sql = "INSERT INTO `transaction`
          (`transactionID`, `customerName`, `customerEmail`, `customerphone`, `customerAddress`, `amount`, `message`, `created`,`transactioninfo`,`status`)
           VALUES
          (NULL, '".$custName."',  '".$custEmail."', '".$custphone."', '".$custAddress."',
            '".$total."', '".$custMsg."', NOW() ,'".$merger."','".$status."' )  ";
            if($con->insert($sql)){
              echo "Xác nhận";
            }else {
              echo 'tach';
            }


      }



 if(isset($_POST["removecart"])){
   $i = $_POST["removecart"];
 if(isset($_SESSION['name'][$i])){
  unset($_SESSION['name'][$i]);
  unset($_SESSION['price'][$i]);
  unset($_SESSION['size'][$i]);
  unset($_SESSION['quantity'][$i]);
  unset($_SESSION['note'][$i]);
  $_SESSION["name"] = array_values($_SESSION["name"]);
  $_SESSION["price"] = array_values($_SESSION["price"]);
  $_SESSION["size"] = array_values($_SESSION["size"]);
  $_SESSION["quantity"] = array_values($_SESSION["quantity"]);
  $_SESSION["note"] = array_values($_SESSION["note"]);
  echo'hoan tat';

    
 }
  

}
 ?>
