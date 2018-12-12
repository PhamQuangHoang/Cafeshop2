<?php 
include("header.php");
include("config.php");
$con = new Connect('cafepage');


 ?> <style type="text/css">
    img {
       max-width: 800px;max-height: 600px;
       display: block;
        margin-left: auto;
        margin-right: auto;
    }
    p {
      font-size: 15px; 
    
    }
     em { 
      font-size: 13px; 
    }
 </style>

    <section class="fifth-block mt-8p mb-90">
            <div class="container">
                <div class="block-heading">
                    <h1>SỰ KIỆN </h1>
                </div>
               <?php 
                    $str = $_GET['title'];

                    $sql = "SELECT *  FROM `event` WHERE eventName LIKE '%".$str."%' ";
                 $row= $con->select($sql);
                 if($row!=0){
                     for($i = 0 ;$i<sizeof($row);$i++){

                        echo '<h2>' . $row[$i]['eventName'] . '</h2>' ;
                        echo '<p> Ngày đăng : '.$row[$i]['eventHour'] .'pm '.  $row[$i]['eventDate'] . '</p>' ;
                        echo $row[$i]['eventContent'];
                     }

                 }


                ?>
              
                
                 </div> 
        </section>
       
             
              
                
                
    

          
        <!--Main part-->
 <?php 
 include("footer.php");
  ?>