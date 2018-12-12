        <?php 
           $sql = "SELECT productType,productID FROM `listproduct` GROUP BY productType";
             $row= $con->select($sql);
             if($row!=0){
                $ref1='ref-'.$row[2]['productID'];
                $ref2='ref-'.$row[1]['productID'];
                $ref3='ref-'.$row[0]['productID'];
                $ref4='ref-'.$row[3]['productID'];
            echo' <section class="forth-block" id="ordering">
            <div class="container">
                <div class="block-heading">
                    <h1></h1>
                </div>
                 <div class="row">
                    <div class="gallery-block">
                        <div class="col-md-3 col-sm-3 col-xs-3 width_100">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#All">Tất cả</a></li>
                                <li><a data-toggle="tab" href="#ref-'.$row[2]['productID'].'">'.$row[2]['productType'].'</a></li>
                                <li><a data-toggle="tab" href="#ref-'.$row[1]['productID'].'">'.$row[1]['productType'].'</a></li>
                                <li><a data-toggle="tab" href="#ref-'.$row[0]['productID'].'">'.$row[0]['productType'].'</a></li>
                                <li><a data-toggle="tab" href="#ref-'.$row[3]['productID'].'">'.$row[3]['productType'].'</a></li>
                            </ul>
                        </div>
                        ';
                }
            echo '  <div class="col-md-9 col-sm-9 col-xs-9 width_100">
                            <div class="tab-content">
                                <div id="All" class="tab-pane fade in active">
                                    <div class="row">';
           $sql = "SELECT `productID`, `productType`, `productName`, `productImage`, `productPrice` FROM `listproduct` WHERE 1";
           $row = $con->select($sql);
           if($row!=0){
                for($i = 0 ;$i<sizeof($row);$i++){
                    echo'<div class="col-md-4 col-sm-4 col-xs-4">
                             <div class="tab-image">
                                 <img src="images/About/'.$row[$i]['productImage'].'.png" class="img-responsive" alt="2">
                                 <div class="overlay">
                                     <a class="info" href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                                     <p class="tag-info">'.$row[$i]['productName'].'</p>
                                     <p class="tag-info">'.$row[$i]['productPrice'].' vnd</p>
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
                                 <img src="images/About/'.$row[$i]['productImage'].'.png" class="img-responsive" alt="2">
                                 <div class="overlay">
                                     <a class="info" href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                                     <p class="tag-info">'.$row[$i]['productName'].'</p>
                                     <p class="tag-info">'.$row[$i]['productPrice'].' vnd</p>
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
                                 <img src="images/About/'.$row[$i]['productImage'].'.png" class="img-responsive" alt="2">
                                 <div class="overlay">
                                     <a class="info" href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                                     <p class="tag-info">'.$row[$i]['productName'].'</p>
                                     <p class="tag-info">'.$row[$i]['productPrice'].' vnd</p>
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
                                 <img src="images/About/'.$row[$i]['productImage'].'.png" class="img-responsive" alt="2">
                                 <div class="overlay">
                                     <a class="info" href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                                     <p class="tag-info">'.$row[$i]['productName'].'</p>
                                     <p class="tag-info">'.$row[$i]['productPrice'].' vnd</p>
                                 </div>
                             </div>
                         </div>';
                }
           }
            echo'             </div>
                            </div>
                            <div id="'.$ref4.'" class="tab-pane fade ">
                                    <div class="row">';
               $sql = "SELECT `productID`, `productType`, `productName`, `productImage`, `productPrice` FROM `listproduct` WHERE productType LIKE 'Trà'";
             $row = $con->select($sql);
              if($row!=0){
                for($i = 0 ;$i<sizeof($row);$i++){
                    echo'<div class="col-md-4 col-sm-4 col-xs-4">
                             <div class="tab-image">
                                 <img src="images/About/'.$row[$i]['productImage'].'.png" class="img-responsive" alt="2">
                                 <div class="overlay">
                                     <a class="info" href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                                     <p class="tag-info">'.$row[$i]['productName'].'</p>
                                     <p class="tag-info">'.$row[$i]['productPrice'].' vnd</p>
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
