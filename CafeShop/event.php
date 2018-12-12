<?php 
include("header.php");
include("config.php");
$con = new Connect('cafepage');


 ?>
    <section class="fifth-block mt-8p mb-90">
            <div class="container">
                <div class="block-heading">
                    <h1>SỰ KIỆN </h1>
                </div>
               <?php 
                    $sql = "SELECT `eventID`, `eventName`, `eventDate`,`eventHour`, `eventContent`, `eventImage` FROM `event` WHERE 1";
                 $row= $con->select($sql);
                 if($row!=0){
                     for($i = 0 ;$i<sizeof($row);$i++){
                        $phpdate = strtotime( $row[$i]['eventDate'] );
                        $dateEvent = date( 'Y-m-d', $phpdate );
                        
                        echo '  <div class="row mt-30">
                                    <div class="events">
                                        <div class="event-image">
                                            <img src="'.$row[$i]['eventImage'].'" alt="event1" class="img-responsive"> 
                                        </div>
                                        <div class="event-details">
                                            <div class="row">
                                                <div class="col-md-9 col-sm-8 col-xs-8 text-left width_100 txt_center">
                                                    <a href="eventdetails.php?title='.$row[$i]['eventName'].'">'.$row[$i]['eventName'].'</a>
                                                </div>
                                                <div class="col-md-3 col-sm-4 col-xs-4 text-right width_100 txt_center">
                                                    <span><img src="images/Event/clock.png" alt="clock"><span> '.$row[$i]['eventHour'].'</span></span>
                                                    <span><img src="images/Event/calender.png" alt="calender"><span> '.$dateEvent.'</span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>         ';
                     }

                 }


                ?>
              
                
                 </div> 
        </section>
       
             
              
                
                
    

          
        <!--Main part-->
 <?php 
 include("footer.php");
  ?>