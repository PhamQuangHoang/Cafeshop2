<?php 
include("header.php");
include("config.php");
$con = new Connect('cafepage');
if(isset($_GET['success'])){
	$check =$_GET['success'];
	if($check==1){
		echo' <script>
		    $( document ).ready(function() {
		        $(".popup").removeClass("hidden");
				 $(".mess").html("Thư đã gữi thành công");
				 $(".confirm").click(function(){
				        $(".popup").addClass("hidden");
				       	
				    });
		    });
    </script>';
	}



}	
 ?>

   


      <!--Main part-->
  		<div class="popup hidden">
                <div class="row ">
                    <div class="col-md-12 col-sm-12 col-xs-12  text-center  " >
                    	<p>&emsp;&emsp;&emsp;&emsp;&emsp;Thông báo &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</p>
                        <p class="mess ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. In, vitae.</p>
                        <button type="button" class="btn btn-default confirm ">OK</button>
                    </div>
       			 </div>
   	   </div>
        <section class="contact-block mt-8p mb-90">
            <div class="container">
                <div class="block-heading">
                    <h1>LIÊN HỆ</h1>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <form name="sentMessage" id="contactForm"  action="send_msg.php" method="post">
                            <div class="row">
                                <div class="contact-menu bgcolor1 book-form">
                                    <div class="form-group">
                                        <input type="text" id="name" name="custName" class="form-control placeholder-fix" placeholder="Tên :" required="" aria-invalid="false">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="contact" name="phoneNO" class="form-control placeholder-fix" placeholder="Số điện thoại liên hệ :" required="">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" id="email" name="custEmail" class="form-control placeholder-fix" placeholder="Email :" required="">
                                    </div>
                                    <div class="form-group">
                                        <textarea name="message" id="message" name="message" class="form-control placeholder-fix" rows="5" placeholder="Tin nhắn :" required="" aria-invalid="false"></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="buttons">
                                        <button type="reset" class="btn">Xóa hết</button>
                                        <button type="submit" name="send" class="btn send">Gửi</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <ul class="contact-list">
                            <li>
                                <i class="fa fa-map-marker fa-lg"></i>
                                <p><a href="#">LÊ DUẪN ĐÀ NẴNG</a></p>
                            </li>
                            <li>
                                <i class="fa fa-envelope-o fa-lg"></i>
                                <p><a href="mailto:demo@info.com"> pqhoang.17it2@Sict.udn.vn</a></p>
                            </li>
                            <li>
                                <i class="fa fa-phone fa-lg"></i>
                                <p><a href="tel:+1-202-555-0100"> 0947443706</a></p>
                            </li>
                            <li>
                                <i class="fa fa-globe fa-lg"></i>
                                <p><a href="index.php"> www.housecoffe.com</a></p>
                            </li>
                        </ul>
                        <div class="contact-social-icon">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d101257.12284776446!2d-77.56330202084071!3d37.52477641775529!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89b111095799c9ed%3A0xbfd83e6de2423cc5!2sRichmond%2C+VA%2C+USA!5e0!3m2!1sen!2sin!4v1488891294599"  frameborder="0" style="border:0; width: 100%; height: 350px; margin-top: 35px;" allowfullscreen></iframe>
                </div>
            </div>
        </section>





 <?php include("footer.php") ?>