<?php $config = new Config();
	$result_bill = $config->selectData('select * from bill');
	$i = 1;
 ?>
 <div class="limiter">
 	<div class="container-table100">
 		<div class="wrap-table100">
 				<div class="table" id="table_table">

 					<div class="row header" id="table_row">
 						<div class="cell">
 							Stt
 						</div>
 						<div class="cell">
 							Bàn
 						</div>
 						<div class="cell">
 							Nhân viên
 						</div>
 						<div class="cell">
 							Thực đơn
 						</div>
 						<div class="cell">
 							Phụ thu
 						</div>
 						<div class="cell">
 							Giảm giá
 						</div>
 						<div class="cell">
 							Thành tiền
 						</div>
 						<div class="cell">
 							Tiền nhận
 						</div>
 						<div class="cell">
 							Thời gian
 						</div>
 					</div>
		<?php foreach ($result_bill as $rows) {
		?>
 					<div class="row" id="table_row">
 						<div class="cell" data-title="STT">
 							<?php echo $i++; ?>
 						</div>
 						<div class="cell" data-title="Bàn">
 							Bàn <?php echo $rows['bill_table']; ?>
 						</div>
 						<div class="cell" data-title="Nhân viên">
 							<?php echo $rows['bill_employee']; ?>
 						</div>
 						<div class="cell" data-title="Thực đơn">
 							<?php echo $rows['bill_drinks']; ?>
 						</div>
 						<div class="cell" data-title="Phụ Thu">
 							<?php echo $rows['bill_phuthu']; ?>
 						</div>
 						<div class="cell" data-title="Giảm giá">
 							<?php echo $rows['bill_sale']; ?>%
 						</div>
 						<div class="cell" data-title="Thành Tiền">
 							<?php echo $rows['bill_price']; ?>
 						</div>
 						<div class="cell" data-title="Tiền nhận">
 							<?php echo $rows['bill_moneytaked']; ?>
 						</div>
 						<div class="cell" data-title="Thời gian">
 							<?php echo $rows['bill_time']; ?>
 						</div>
 					</div>
		<?php } ?>
 					

 				</div>
 		</div>
 	</div>
 </div>