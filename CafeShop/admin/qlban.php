<script type="text/javascript" src="js/qlban.js"></script>
<script src="js/jquery.cookie.js"></script>
<?php 

	require_once 'config.php';
	$config = new Config;
	$result = $config->selectData('select * from frmtable');
 ?>
<div class="infomation  hidden" id="exchange">
	<p><button type="button" id="setcookie" name="button"  ><i class="fas fa-exchange-alt" ></i> Về lại quản lý bàn</button></p>
</div>

<div class="table-responsive" id="mytable"> </div>
<div id="ordertable">
	<div class="col-lg-6 col-md-6 col-sm-12-col-xs-12 table-bordered order-table">
			<?php foreach ($result as $rows) { 
			
			echo '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3" >
			<a href="javascript:void(0)" class="text-center"';
				if($rows['status'] == 1 ) {
					echo 'style="color: #2ecc71; "' ; 
					
				}

			    if(isset($_COOKIE['ban'.$rows['tableID']])) {
					echo 'style="color: #2ecc71; "';
				}

				if($rows['status'] == 0 ){
					echo 'style="color: #0060B6;"';
					if(isset($_COOKIE['ban'.$rows['tableID']])) {
						  setcookie("ban".$rows['tableID'], '', 1, "/");
						  unset($_COOKIE['ban'.$rows['tableID']]);
						  
					}
				}
				

			echo 'onclick="startup(id);" id="tb'.$rows['tableID'].'">
				<h3 class="glyphicon glyphicon-glass" ></h3><br/>Bàn '.$rows['tableID'].'
			</a>
		</div>';

			 } ?>

		
	</div>
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				Ý tưởng mới đi  ,

	</div>
</div>


<div class="detailtable hidden" id="detailtable">
			<div class="" id="result">

			</div>
			<div class="row">

				<div class="col-md-6 col-xs-12">
					<div class="em-profile">
						 <img align="left" class="em-image-lg" src="https://www.iotforall.com/wp-content/uploads/2017/08/background-Newsletter-Signup.png" alt="Profile image example"/>
						 <img align="left" class="em-image-profile thumbnail" src="https://cdn.iconscout.com/icon/free/png-256/avatar-369-456321.png" alt="Profile image example"/>
						 <div class="em-profile-text">
								 <h4 id="em-profile" >admin</h4>
						 </div>
				 </div>
				<div class="infomation" id="infrm">
						<p>Bàn : <span id="ban"></span> </p>
						<p>Giờ vào : <span id="joindate"></span> </p>
						<p>Giờ ra  : <span id="leftdate"></span> </p>
				</div>
				<div class="infomation">
					<ul class="nav nav-tabs">
						<li>	<p><button type="button" onclick="startorder();" id="start" name="button"><i class="fas fa-play-circle"></i> Bắt đầu</button></p></li>
						<li>	<p>	<button type="button" onclick="endup();" id="end"  name="button" 	><i class="fas fa-stop" ></i> kết thúc</button></p></li>
						<li><p >	<button type="button" onclick="removedt();" name="button" ><i class="fas fa-ban"></i> Hủy bàn</button></p></li>
						<li class="dropdown">
							 <button class="dropdown-toggle" data-toggle="dropdown">Thêm
							 <span class="caret"></span></button>
							 <ul class="dropdown-menu">
								 <li><p>	<button type="button" name="button" id="chuyenban" data-toggle="modal" data-target="#myModal"><i class="fas fa-exchange-alt"></i>Chuyển bàn</button></p></li>
								 <li><p>	<button type="button" name="button" id="ghepban" data-toggle="modal" data-target="#myModal"><i class="fab fa-connectdevelop"></i>Ghép bàn</button></p></li>
							 </ul>
						 </li>
					</ul>
				</div>
				<div class="table-responsive" id="tbd">
					<table class="table table-sm" id="ordertab">
					  <thead>
					    <tr>
					      <th scope="col">Mã hàng</th>
					      <th scope="col">Tên hàng</th>
					      <th scope="col">Giá</th>
					      <th scope="col">Số lượng</th>
					      <th scope="col">Thành tiền</th>
					    </tr>
					  </thead>
					  <tbody id="databody">

					  </tbody>
			</table>
				</div>
				<div class="infomation ">
					 <ul class="nav nav-tabs text-center">
						 	<li >Tên hàng :	<input type="text" id="editqty" style=" text-align:center;" name="" value="" disabled="true"> | <button type="button" id="huymon" name="button">Hủy món</button></li>
					 		<li>
								<div class="input-group number-spinner">
								<span class="input-group-btn">
									<button id="sub" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></button>
								</span>
								<input type="text" class="text-center" id="qtyvalue" value="1">
								<span class="input-group-btn">
									<button  data-dir="up"><span class="glyphicon glyphicon-plus"></span></button>
								</span>
							</div>
						</li>
					 </ul>
				</div>
				<div class="infomation mt-15">
			 		<div id="bb">
			 			<p>	Thành tiền :<span id="totalbill">0</span> vnd</p>
						<p>	 Ghi chú: <span id="note"></span> vnd</p>
				 		<p>	Tổng giờ :	<span id="timesum">0</span></p>
			 		</div>
			 		<p>	Khách đưa : <input type="text" name="" value="" id="money"> </p>
			 		<p>	Tiền thừa :&emsp;<input type="text" name="" value="" id="moneyback"> </p>
			 		<p>	<button type="button" name="button" onclick="printDiv();"><i class="fas fa-file-export"></i>Xuất bill</button> </p>
				</div>

				</div>
				<div class="col-md-6 col-xs-12">
					<section class="forth-block mt-8p ">

						<div class="block-heading mt-15">
							<h1>Menu</h1>
						</div>
					
						<div class="row">
							<div class="menu-block">
								<div class="col-md-3 col-sm-3 col-xs-3 ">
									
									<ul class="nav nav-pills nav-stacked">
										<li class="active"><a data-toggle="tab" href="#All">All</a></li>
										<?php 
										
										$result = $config->selectData('select * from type_drink');
										$arr = array();
										$count =0;
										foreach ($result as $rows) { 
										 	
										 	array_push($arr,'#data-'.$rows['type_id']);
										 	echo'<li><a data-toggle="tab" href="#data-'.$rows['type_id'].'" >'.$rows['type_name'].'</a></li>';
										 }
										
										 $result = $config->selectData('select count(*) as count from type_drink');
										 	foreach ($result as $rows) { 
										 		$count = $rows['count'];
										 	 }
									 ?>	
									</ul>

								
								</div>
								<div class="col-md-9 col-sm-9 col-xs-9 ">
									<div class="tab-content">
										<div id="All" class="tab-pane fade in active">
											<div class="row">
												<div class="col-md-12 ">
													<table class="table">
														<thead>
															<tr>
																<th scope="col">STT</th>
																<th scope="col">Tên hàng </th>
																<th scope="col">Giá</th>
															</tr>
														</thead>
														<tbody>
															<?php $i=1;
																	$result_right = $config->selectData('select * from drink where 1 ');
																		foreach ($result_right as $rows_right) {
																			echo '	<tr>
																						<th scope="row">'.$i++.'</th>
																						<td>
																							<label class="task">
																								<input type="checkbox" class="mainlist" name="checkbox" data-ref="'. $rows_right['drink_id'].'" value="'. $rows_right['drink_name'].'|'.$rows_right['price'].'">
																								<i class="fas fa-check"></i>
																								<span class="text">'. $rows_right['drink_name'].'</span>
																							</label></td>
																						<td>'.$rows_right['price'].'</td>
																					</tr>';
																		}

															 ?>

														</tbody>
													</table>
												</div>

											</div>
										</div>
						<?php 	for($k=0;$k<$count;$k++){
										echo '<div id="'.str_replace("#","",$arr[$k]).'" class="tab-pane fade">
											<div class="row">
													<div class="col-md-12 ">
													<table class="table">
														<thead>
															<tr>
																<th scope="col">STT</th>
																<th scope="col">Tên hàng </th>
																<th scope="col">Giá</th>
															</tr>
														</thead>
														<tbody>';
																	$i=1;
																	$result_right = $config->selectData('select * from drink where type_id = '.str_replace('#data-',"",$arr[$k]).' ');
																		foreach ($result_right as $rows_right) {
																			echo '	<tr>
																						<th scope="row">'.$i++.'</th>
																						<td>
																							<label class="task">
																								<input type="checkbox" class="mainlist" name="checkbox" data-ref="'. $rows_right['drink_id'].'" value="'. $rows_right['drink_name'].'|'.$rows_right['price'].'">
																								<i class="fas fa-check"></i>
																								<span class="text">'. $rows_right['drink_name'].'</span>
																							</label></td>
																						<td>'.$rows_right['price'].'</td>
																					</tr>';
																		}

										echo'	
														</tbody>
													</table>
												</div>
											</div>
										</div>';
								}
															 ?>
													<!-- 		
															<tr>
																<th scope="row">3</th>
																<td>
																	<label class="task">
																		<input type="checkbox" class="mainlist" name="checkbox" data-ref="3" value="Caramel phin cafe|29000">
																		<i class="fas fa-check"></i>
																		<span class="text">Caramel phin cafe</span>
																	</label></td>
																<td>29000</td>
															</tr>
 -->
													
										<!-- <div id="Salads" class="tab-pane fade">
											<div class="row">

											</div>
										</div>
										<div id="starters" class="tab-pane fade">
											<div class="row">

											</div>
										</div> -->
									</div>
								</div>
							</div>
						</div>
				</div>
			</section>
		</div>


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="titlemd"></h4>
        </div>
        <div class="modal-body">
					<select id="optional">
						<?php
							for($i=1;$i<13;$i++){
								echo' <option value="ban'.$i.'">Bàn '.$i.'</option>';
							}
						 ?>

				</select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default"  data-dismiss="modal" id="confirm">Xác nhận</button>
        </div>
      </div>
    </div>
  </div>
</div>
