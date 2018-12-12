<?php
include("header.php");
include("config.php");
$con = new Connect('cafepage');
error_reporting(0);

 ?>
 <script type="text/javascript" src="js/payment.js">

 </script>

 <div class="container mb-90">
   <div class="row">
     <section>
       <div class="wizard">
         <div class="wizard-inner">
           <div class="connecting-line"></div>
           <ul class="nav nav-tabs" role="tablist">

             <li role="presentation" class="active">
               <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Bước 1">
                 <span class="round-tab">
                   <i class="fa fa-shopping-cart"></i>
                 </span>
               </a>
             </li>

             <li role="presentation" class="disabled">
               <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="bước 2">
                 <span class="round-tab">
                   <i class="fa fa-pencil" aria-hidden="true"></i>
                 </span>
               </a>
             </li>
             <li role="presentation" class="disabled">
               <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="bước 3">
                 <span class="round-tab">
                 <i class="fa fa-credit-card" aria-hidden="true"></i>
                 </span>
               </a>
             </li>

             <li role="presentation" class="disabled">
               <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Hoàn thành">
                 <span class="round-tab">
                   <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                 </span>
               </a>
             </li>
           </ul>
         </div>

         <!-- <form role="form" > -->
           <div class="tab-content">
             <div class="tab-pane active" role="tabpanel" id="step1">
               <h3>1. Xác nhận đơn hàng</h3>

  
                 <div class="row">


                   <?php 		if(isset($_SESSION['name'])){

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
                             echo '<div class="col-md-4 font-format place-border p-pay  mb-20" id="'.$i.'">
                               <div class="remove-btn"><a href="javascript:void(0)" onclick="removecart('.$i.')"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a></div>
                               <div class="row">&emsp; &nbsp;<span class="name">'.$_SESSION['name'][$i].' </span>|Số lượng<span class="qty"> '.$qty.' </span></div>
                               <div class="row">&emsp;Size : <span class="Size">'.$size.' </span> | <span>Đơn giá :'.number_format($subtotal,-2).' <i>đ</i></span> </div>
                               <div class="row">&emsp;';
                               if($_SESSION['note'][$i] !=""){
                                echo'Ghi chú:  '.$_SESSION['note'][$i].' ';
                               }

                               echo'</div>
                             </div>';

                           }


                         echo '  </div>
                            <div class="row mb-20">
                                <ul class="cart-order font-format">
                                  <li>
                                    <p><b>Tổng cộng: <span id="pr-count">'.count($_SESSION['name']).'</span> Món</b></p>
                                  </li>
                                </ul>
                                <ul class="cart-order">
                                  <li><b>Tổng tiền : <span id="pr-sum">'.number_format($total,-2).'</span><i>đ</i></b></li>
                                </ul>
                            </div>';


                     }else {
                          echo '<h1 align="center";>Giỏ hàng rổng </h1>
                          </div>
                            <div class="row mb-20">
                                <ul class="cart-order font-format">
                                  <li>
                                    <p><b>Tổng cộng: <span id="pr-count">0</span> Món</b></p>
                                  </li>
                                </ul>
                                <ul class="cart-order">
                                  <li><b>Tổng tiền : <span id="pr-sum">0</span><i>đ</i></b></li>
                                </ul>
                            </div>'   ;
                     }




                       ?>










               <ul class="list-inline pull-right">
                 <li><button type="button" class="btn btn-primary next-step">Xác nhận và tiếp tục </button></li>
               </ul>
             </div>
             <div class="tab-pane" role="tabpanel" id="step2">
               <h3>2 . Thông tin khách hàng</h3>
               <div class="contact-form" id="contact-form">
                 <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                            <input type="text" class="form-control text-name"  name="custName" autocomplete="off" id="custName" placeholder="Tên">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                            <input type="text" class="form-control text-name" name="custaddress" autocomplete="off" id="custaddress" placeholder="Địa chỉ">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                            <input type="text" class="form-control text-name" name="custphone"   autocomplete="off" id="custphone" placeholder="Số điện thoại">
                      </div>
                    </div>
                      <div class="col-md-6">
                        <div class="form-group">
                              <input type="email" class="form-control text-name" name="custemail" autocomplete="off" id="custemail" placeholder="E-mail">
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
                          <textarea class="form-control textarea"  rows="3" name="custmessage" id="custmessage" placeholder="Message"></textarea>
                    </div>
                  </div>
                  </div>



               </div>
               <ul class="list-inline pull-right">
                 <li><button type="button" class="btn btn-default prev-step">Trở về</button></li>
                 <li><button type="button" class="btn btn-primary next-step">Xác nhận và tiếp tục </button></li>
               </ul>
             </div>
             <div class="tab-pane" role="tabpanel" id="step3">
               <h3>3. Phương thức thanh toán</h3>
               <div class="paymentWrap">
                <div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
                       <label class="btn paymentMethod active">
                        <div class="method cod"></div>

                          <input type="radio" name="options">
                      </label>
                      <label class="btn paymentMethod ">
                        <div class="method visa"></div>
                          <input type="radio" name="options" checked>
                      </label>
                      <label class="btn paymentMethod">
                        <div class="method master-card"></div>
                          <input type="radio" name="options">
                      </label>
                      <label class="btn paymentMethod">
                        <div class="method momo"></div>
                          <input type="radio" name="options">
                      </label>

                      <label class="btn paymentMethod">
                        <div class="method paypal"></div>
                          <input type="radio" name="options">
                      </label>

                  </div>
            </div>
               <ul class="list-inline pull-right">
                 <li><button type="button" class="btn btn-default prev-step">Trở về</button></li>

                 <li><button type="button" name="success" onclick="finish();" class="btn btn-primary btn-info-full success">Hoàn thành </button></li>
               </ul>
             </div>
             <div class="tab-pane" role="tabpanel" id="complete">
               <h2>Bạn đã hoàn thanh việc đặt hàng </h2>

               <p><h3>Hàng sẽ sớm được giao trong vòng 30p nữa</h3></p>
               <p><h3><a href="index.php" class="link text-center"> Quay lại trang chủ</a></h3></p>
             </div>
             <div class="clearfix"></div>
           </div>
         <!-- </form> -->
       </div>
     </section>
   </div>
 </div>




 <?php include("footer.php"); ?>
