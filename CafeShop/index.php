<?php 
include("header.php");
include("config.php");
$con = new Connect('cafepage');

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


   <script type="text/javascript">
       $(document).ready(function () {
    // Handler for .ready() called.
    $('html, body').animate({
        scrollTop: $('#Carousel1').offset().top
    }, 1500);
});

   </script>
        <!--Slider-->
        <div id="Carousel1" class="carousel slide mt-30 mb-60" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="images/Home/indexbanner.png" class="img-responsive" style="width: 100%" alt="banner1" height="700">
                    <div class="carousel-caption" >
                        <h1 style="font-family: montserrat">Hương vị đậm đà</h1>
                        <h2 style="font-family: montserrat">Chất lượng tuyệt hảo</h2>
                        <div ><a class="btn" style="color: white; margin-left: 230px; border-color: white; " href="menu.php" >Đặt hàng ngay </a></div>
                    </div>      
                </div>

            </div>
        </div>

          
        <!--Main part-->
 <?php include("footer.php"); ?>