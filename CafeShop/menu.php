<?php  
include("header.php");
include("config.php");
$con = new Connect('cafepage');



 ?>
    

<h1 align="center" class="mt-20">Giao hàng nhanh chóng </h1>
                    <!-- ShowOrder  -->
               <div class="row"> 
                                             <div class="col-md-8 details hidden" id="showorder">
                                            
                                                <div class="row details-header ">
                                                   <div class="col-md-2  col-xs-4 col-sm-4">
                                                        <img src="https://www.highlandscoffee.com.vn/vnt_upload/product/06_2018/thumbs/270_crop_PHIN-SUA-NONG.png" class="img-responsive proimg" alt="1">                                       
                                                   </div> 
                                                   <div class="col-md-8 col-xs-8 col-sm-8 mt-20">
                                                        <span class="proname">Chả lụa xá xíu</span><br>
                                                        <span class="proprice">123123</span>

                                                       
                                                   </div>
                                                </div>
                                                <div class="row details-header ">
                                                   <div class="col-md-12 col-sx-12 col-sm-12  mt-20 mb-20">
                                                    <span style="margin-left: 10px;">Size</span> <br>
                                                 
                                                        <div class="checkboxSize" ><input type="checkbox" id=
                                                        "small" class="ex" name="" checked>
                                                            <span> Size nhỏ (475 ml)
                                                                </span>
                                                        </div>
                                                        
                                                        <div class="checkboxSize" ><input type="checkbox"  class="ex" name="">
                                                            <span> Size Vừa(600 ml) (+7.000 ₫)</span>
                                                        </div>                                     
                                                   </div> 
                                                </div>
                                                <div class="row details-header">
                                                     <div class="form-group a">
                                                        <input type="text" id="note" class="form-control placeholder-fix" placeholder="Thêm ghi chú :"  >
                                                     </div>
                                                </div> 
                                                <div class="row details-header">
                                                     <div class="form-group a">
                                                         <div class="numbers-row">
                                                            <div class="inc button counter">+</div>
                                                            <div class="counter"><input type="text" name="" id="proNum" value="1" disabled="true"></div>
                                                            <div class="dec button counter">-</div>
                                                          
                                                         </div>
                                                         
                                                           
                                                            <input type="submit" name=""  class="add-cart" onclick="cart();" value="Thêm vào giỏ hàng">
                                                          
                                                     </div>

                                                </div>


                                          

                                        </div>
                                    </div>                     
                                   

        <?php 
           $sql = "SELECT productType,productID FROM `listproduct` GROUP BY productType";
             $row= $con->select($sql);
             if($row!=0){
                $ref1='ref-'.$row[2]['productID'];
                $ref2='ref-'.$row[1]['productID'];
                $ref3='ref-'.$row[0]['productID'];
                $ref4='ref-'.$row[3]['productID'];
                $ref5='ref-'.$row[4]['productID'];

            echo' <section class="forth-block" id="ordering">
            <div class="container">
                <div class="block-heading">
                    <h1></h1>
                </div>
                 <div class="row">
                    <div class="gallery-block">
                        <div class="col-md-3 col-sm-3 col-xs-3 width_100">
                          <div class="row">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#All">Tất cả</a></li>
                                <li><a data-toggle="tab" href="#ref-'.$row[2]['productID'].'">'.$row[2]['productType'].'</a></li>
                                <li><a data-toggle="tab" href="#ref-'.$row[1]['productID'].'">'.$row[1]['productType'].'</a></li>
                                <li><a data-toggle="tab" href="#ref-'.$row[0]['productID'].'">'.$row[0]['productType'].'</a></li>
                                <li><a data-toggle="tab" href="#ref-'.$row[3]['productID'].'">'.$row[3]['productType'].'</a></li>
                                <li><a data-toggle="tab" href="#ref-'.$row[4]['productID'].'">'.$row[4]['productType'].'</a></li>
                            </ul>
                           </div> 
                    ';

                }
               ?>
                        <div class="row mt-90 cart-show border">
                               <div class="col-md-12 col-xs-12 col-sm-12  text-center border-b pb-20">
                                    <button type="submit" class="btn btn-primary look " id="show-cart" onclick="window.location.href = 'payment.php'; ">Xem giỏ hàng/order</button>
                                </div>

                                 <div class="col-md-12 col-xs-12 col-sm-12  my-cart border mb-20" id="mycart" >
                                     
                                        <img src="images/menu/loading-icon.gif" class="img-responsive hidden" id="image">     
                                        
                                      
                                      <div class="row mt-20">
                                            <ul class="cart-order">
                                                   <li> <p>Tổng cộng: <span id="pr-count">0</span> Món</p></li> 
                                            </ul> 
                                            <ul class="cart-order">
                                                  <li >Tổng tiền : <span id="pr-sum">0 </span><i>đ</i></li>
                                            </ul>  
                                        </div> 
                                </div>

                            </div>
                           
                           <!-- end col-md-3 -->
                        </div>

               <?php 
            echo '  <div class="col-md-9 col-sm-12 col-xs-12 width_100">
                            <div class="tab-content">
                                <div id="All" class="tab-pane fade in active">
                                    <div class="row">';
           $sql = "SELECT `productID`, `productType`, `productName`, `productImage`, `productPrice` FROM `listproduct` WHERE 1";
           $row = $con->select($sql);
           if($row!=0){
                for($i = 0 ;$i<sizeof($row);$i++){
                    echo'<div class="col-md-4 col-sm-4 col-xs-4">
                             <div class="tab-image">
                                 <img src="images/About/'.$row[$i]['productImage'].'.png" class="img-responsive images"  id="'.$row[$i]['productID'].'_img" alt="2">
                                 <div class="overlay">
                                     <button class="info" href="" onclick="showorder('.$row[$i]['productID'].');" ><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                     <p class="tag-info tag-name" id="'.$row[$i]['productID'].'_name" >'.$row[$i]['productName'].'</p>
                                     <p class="tag-info tag-price" id="'.$row[$i]['productID'].'_price" >'.number_format($row[$i]['productPrice'],-2).' <i>đ</i></p>
                                 </div>
                             </div>
                         </div>';

                }


           }
           echo'             </div>
                            </div>
                            <div id="'.$ref1.'" class="tab-pane fade ">
                                    <div class="row">';
            $sql = "SELECT `productID`, `productType`, `productName`, `productImage`, `productPrice` FROM `listproduct` WHERE productType LIKE 'Cà phê phin'";
             $row = $con->select($sql);
              if($row!=0){
                for($i = 0 ;$i<sizeof($row);$i++){
                    echo'<div class="col-md-4 col-sm-4 col-xs-4">
                             <div class="tab-image">
                                 <img src="images/About/'.$row[$i]['productImage'].'.png" class="img-responsive" id="'.$row[$i]['productID'].'_img" alt="2">
                                 <div class="overlay">
                                   <button class="info" href="" onclick="showorder('.$row[$i]['productID'].');" ><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                     <p class="tag-info tag-name" id="'.$row[$i]['productID'].'_name" >'.$row[$i]['productName'].'</p>
                                     <p class="tag-info tag-price" id="'.$row[$i]['productID'].'_price" >'.number_format($row[$i]['productPrice'],-2).' <i>đ</i></p>
                                 </div>
                             </div>
                         </div>';
                }


           }
             echo'             </div>
                            </div>
                            <div id="'.$ref2.'" class="tab-pane fade ">
                                    <div class="row">';

             $sql = "SELECT `productID`, `productType`, `productName`, `productImage`, `productPrice` FROM `listproduct` WHERE productType LIKE 'CÀ PHÊ ESPRESSO'";
             $row = $con->select($sql);
              if($row!=0){
                for($i = 0 ;$i<sizeof($row);$i++){
                    echo'<div class="col-md-4 col-sm-4 col-xs-4">
                             <div class="tab-image">
                                 <img src="images/About/'.$row[$i]['productImage'].'.png" class="img-responsive" id="'.$row[$i]['productID'].'_img" alt="2">
                                 <div class="overlay">
                                    <button class="info" href="" onclick="showorder('.$row[$i]['productID'].');" ><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                     <p class="tag-info tag-name" id="'.$row[$i]['productID'].'_name" >'.$row[$i]['productName'].'</p>
                                     <p class="tag-info tag-price" id="'.$row[$i]['productID'].'_price" >'.number_format($row[$i]['productPrice'],-2).' <i>đ</i></p>
                                 </div>
                             </div>
                         </div>';
                }


           }
           echo'             </div>
                            </div>
                            <div id="'.$ref3.'" class="tab-pane fade ">
                                    <div class="row">';
               $sql = "SELECT `productID`, `productType`, `productName`, `productImage`, `productPrice` FROM `listproduct` WHERE productType LIKE 'Bánh mì'";
             $row = $con->select($sql);
              if($row!=0){
                for($i = 0 ;$i<sizeof($row);$i++){
                    echo'<div class="col-md-4 col-sm-4 col-xs-4">
                             <div class="tab-image">
                                 <img src="images/About/'.$row[$i]['productImage'].'.png" class="img-responsive" id="'.$row[$i]['productID'].'_img" alt="2">
                                 <div class="overlay">
                                    <button class="info" href="" onclick="showorder('.$row[$i]['productID'].');" ><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                     <p class="tag-info tag-name" id="'.$row[$i]['productID'].'_name" >'.$row[$i]['productName'].'</p>
                                     <p class="tag-info tag-price" id="'.$row[$i]['productID'].'_price" >'.number_format($row[$i]['productPrice'],-2).' <i>đ</i></p>
                                 </div>
                             </div>
                         </div>';
                }
           }
            echo'             </div>
                            </div>
                            <div id="'.$ref4.'" class="tab-pane fade ">
                                    <div class="row">';

             $sql = "SELECT `productID`, `productType`, `productName`, `productImage`, `productPrice` FROM `listproduct` WHERE productType LIKE 'Freeze (Đá xay)'";
             $row = $con->select($sql);
              if($row!=0){
                for($i = 0 ;$i<sizeof($row);$i++){
                    echo'<div class="col-md-4 col-sm-4 col-xs-4">
                             <div class="tab-image">
                                 <img src="images/About/'.$row[$i]['productImage'].'.png" class="img-responsive" id="'.$row[$i]['productID'].'_img" alt="2">
                                 <div class="overlay">
                                    <button class="info" href="" onclick="showorder('.$row[$i]['productID'].');" ><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                     <p class="tag-info tag-name" id="'.$row[$i]['productID'].'_name" >'.$row[$i]['productName'].'</p>
                                     <p class="tag-info tag-price" id="'.$row[$i]['productID'].'_price" >'.number_format($row[$i]['productPrice'],-2).' <i>đ</i></p>
                                 </div>
                             </div>
                         </div>';
                }


           }
            echo'             </div>
                            </div>
                            <div id="'.$ref5.'" class="tab-pane fade ">
                                    <div class="row">';
               $sql = "SELECT `productID`, `productType`, `productName`, `productImage`, `productPrice` FROM `listproduct` WHERE productType LIKE 'Trà'";
             $row = $con->select($sql);
              if($row!=0){
                for($i = 0 ;$i<sizeof($row);$i++){
                    echo'<div class="col-md-4 col-sm-4 col-xs-4">
                             <div class="tab-image">
                                 <img src="images/About/'.$row[$i]['productImage'].'.png" class="img-responsive" id="'.$row[$i]['productID'].'_img" alt="2">
                                 <div class="overlay">
                                    <button class="info" href="" onclick="showorder('.$row[$i]['productID'].');" ><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                     <p class="tag-info tag-name" id="'.$row[$i]['productID'].'_name" >'.$row[$i]['productName'].'</p>
                                     <p class="tag-info tag-price" id="'.$row[$i]['productID'].'_price" >'.number_format($row[$i]['productPrice'],2).' <i>đ</i></p>
                                 </div>
                             </div>
                         </div>';
                }
           }
            echo'                        </div>
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>';

?>

      


 <?php include("footer.php"); ?>