 <?php 
include("../config.php");
$con = new Connect('cafepage');

        $sql = "SELECT `transactionID`, `customerName`, `customerEmail`, `customerphone`, `customerAddress`, `amount`, `note`, `message`, `created`, `transactioninfo`,`status` FROM `transaction` WHERE status ='chờ xác nhận' ";
            $row = $con->select($sql);
            $output ="";
            $arr = array(); 
             if($row!=0){
                for($i = 0;$i<sizeof($row);$i++){   
                  
                    $arr = $row[$i]['transactioninfo'];
                    $arr = json_decode($arr, true); 
                    $number = rand(0,count($arr));
                        $output .= ' <div class="col-md-6" id="card'.$row[$i]['transactionID'].'">
                            <div class="card">
                                
                                <div class="card-body">
                                    <div class="custom-tab">

                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <a class="nav-item nav-link active" id="custom-nav-home-tab" data-toggle="tab" href="#custom-nav-profile'.$row[$i]['transactionID'].'" role="tab" aria-controls="custom-nav-home" aria-selected="true">Khách hàng</a>
                                                <a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab" href="#custom-nav-product'.$row[$i]['transactionID'].'" role="tab" aria-controls="custom-nav-profile" aria-selected="false">Đơn hàng</a>

                                                <a href="javascript:void(0)" onclick="spamr('.$row[$i]['transactionID'].');" style="margin-left:20px; background-color:#ff7675; color: #333;">Spam</a>
                                               
                                                <a href="javascript:void(0)" onclick="transport('.$row[$i]['transactionID'].');" style="margin-left:10px; background-color:#ff7675; color: #333;">'.$row[$i]['status'].'</a>
                                               
                                            </div>
                                        </nav>
                                        <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="custom-nav-profile'.$row[$i]['transactionID'].'" role="tabpanel" aria-labelledby="custom-nav-home-tab">
                                                 <div class="col-md-12 text-left">Mã giao dịch :'.$row[$i]['transactionID'].'</div>
                                                <div class="col-md-12 text-left">Tên khách hàng :'.$arr[0]['name'].'</div>
                                                <div class="col-md-12 text-left">Địa chỉ : '.$arr[0]['address'].'</div>
                                                <div class="col-md-12 text-left">email :'.$arr[0]['email'].'</div>
                                                <div class="col-md-12 text-left">Số điện thoại :'.$arr[0]['phone'].'</div>
                                                <div class="col-md-12 text-left">Ghi chú :'.$arr[0]['message'].'</div>
                                               
                                            </div>
                                           <div class="tab-pane fade" id="custom-nav-product'.$row[$i]['transactionID'].'" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
                                             <table class="table table-border">
                                                    <thead>
                                                        <tr>
                                                            <td>Tên sản phẩm</td>
                                                            <td>số lượng</td>
                                                            <td>Size</td>
                                                        </tr>
                                                   </thead>

                                        ';
                                        
                     for($j=1;$j<count($arr);$j++){
                        $output .= '            <tbody>
                                                       <tr>
                                                           <td>'.$arr[$j]['productname'].'</td>
                                                           <td>'.$arr[$j]['productquantity'].'</td>
                                                           <td>'.$arr[$j]['productsize'].'</td>
                                                       </tr>
                                                   </tbody>';
                                
                    }
                    $output .= '</table>
                                            </div>
                                            
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>';




                }
                  echo $output;



                

            }

            ?>