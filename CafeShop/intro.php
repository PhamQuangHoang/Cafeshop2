<?php 
include("header.php");
include("config.php");
$con = new Connect('cafepage');

 ?>

 <!-- main page -->
    <?php 

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
    
 ?>          <div class="popup hidden">
                <div class="row ">
                    <div class="col-md-12 col-sm-12 col-xs-12  text-center  " >
                            <p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Thông báo &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</p>
                        <p class="mess ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. In, vitae.</p>
                        <button type="button" class="btn btn-default confirm ">OK</button>
                    </div>
                 </div>
             </div>
    
            <!--Slider-->  
        <section class="third-block">
            <div class="container mt-50">
                <div class="block-heading">
                    <h1>GIỚI THIỆU</h1>
                </div>
            </div>
            <div id="Carousel2" class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="images/about/tuhao.jpg" alt="banner1" class="img-responsive" style="width: 100%; height: 100%;">
                         <div class="carousel-caption">
                            <div class="profile">
                                <!-- <h1>Kate Cross</h3>
                                    <h4>"Cooking comes so natural to me. I've been around
                                        kitchens my whole life."</h4> -->
                                    <div class="banner-social-icon">
                                        <a href="#"><i class="fa fa-facebook-official"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                    </div>
                            </div>
                        </div>        
                    </div>

                    <div class="item">
                        <img src="images/about/traxanh.jpg" alt="banner1" class="img-responsive" style="width: 100%; height: 100%;">
                         <div class="carousel-caption">
                            <div class="profile ">

                               <!--  <h1>Kate Cross</h3>
                                    <h4>"Cooking comes so natural to me. I've been around
                                        kitchens my whole life."</h4> -->
                                    <div class="banner-social-icon">
                                        <a href="#"><i class="fa fa-facebook-official"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                    </div>
                            </div>
                        </div>      
                    </div>

                    <div class="item">
                        <img src="images/about/DatViet.jpg" alt="banner1" class="img-responsive" style="width: 100%; height: 100%">
                        <div class="carousel-caption">
                            <div class="profile">
                                <h1></h1>
                                <h4></h4>
                               <!--  <h1>Kate Cross</h3>
                                    <h4>"Cooking comes so natural to me. I've been around
                                        kitchens my whole life."</h4> -->
                                    <div class="banner-social-icon">
                                        <a href="#"><i class="fa fa-facebook-official"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                    </div>
                            </div>
                        </div>      
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#Carousel2" role="button" data-slide="prev">
                    <img src="images/Home/left-arrow2.png" onmouseover="this.src = 'images/Home/left-arrow.png'" onmouseout="this.src = 'images/Home/left-arrow2.png'" alt="left">
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#Carousel2" role="button" data-slide="next">
                    <img src="images/Home/right-arrow2.png" onmouseover="this.src = 'images/Home/right-arrow.png'" onmouseout="this.src = 'images/Home/right-arrow2.png'" alt="left">
                </a>
            </div>
        </section>
        <?php  
// echo Line 1
$sql = "SELECT * FROM `pagecontent` WHERE 1";
 $row= $con->select($sql);
     if($row!=0){
         for($i = 0 ;$i<sizeof($row);$i++){
            echo ' <aside class="first-block mt-90">
            <div class="container">
                <div class="row text-center">
                    <h2 id="block-heading">'.$row[$i]['title'].'</h2>
                    <p id="para">'.$row[$i]['content'].'</p>
                </div>
            </div>
        </aside>';
        }
    }
 ?>
<!-- 
<?php include("intro_php.php"); ?> -->
  
    <section class="sixth-block pb-90">
            <div class="container-fluid">
                <div class="block-heading">
                    <h1>Đặt bàn ngay</h1>
                </div>
                
                <div class="bg-banner">
                    <div class="container">
                        <form name="sentMessage" id="contactForm" action="send_msg.php" method="post">
                            <div class="row">
                                <div class="book-form">
                                    <div class="col-md-offset-1 col-md-5 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <input type="text" id="name" name="custName" class="form-control placeholder-fix" placeholder="Tên :" required="" aria-invalid="false">
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <input type="text" id="contact" name="phoneNO" class="form-control placeholder-fix" placeholder="Số điện thoại:" required="">
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-offset-1 col-md-5 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <input type="email" id="email" name="custEmail" class="form-control placeholder-fix" placeholder="Email :" required="">
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <div class=" col-md-5 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <select class="form-control" id="sel1" name="countpp" ">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="nhieuhon">nhiều hơn</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-offset-1 col-md-10 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <textarea name="message" id="message" class="form-control placeholder-fix" rows="4" placeholder="Tin nhắn :" required="" aria-invalid="false"></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                     </div>
                                       </div>
                            </div>
                            <div class="buttons">
                                <button type="reset" class="btn">Xóa hết</button>
                                <button type="submit" name="send" class="btn send" >Gửi</button>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </section>
      
        


          
        <!--Main part-->
 <?php include("footer.php"); ?>