 <div class="limiter">
 	<div class="container-table100">
 		<div class="wrap-table100">
 				<div class="table" id="table_table">

 					<div class="row header" id="table_row">
 						<div class="cell">
 							Ngày
 						</div>
 						<div class="cell">
 							Ghi chú
 						</div>
 						<div class="cell">
 							Thu: SL
 						</div>
 						<div class="cell">
 							Thu: Giá
 						</div>
 						<div class="cell">
 							Thu: T.Tiền
 						</div>
 						<div class="cell">
 							Chi: SL
 						</div>
 						<div class="cell">
 							Chi: Giá
 						</div>
 						<div class="cell">
 							Chi: T.Tiền
 						</div>
 						
 					</div>
		<?php
			$result_thuchi = $config->selectData('select * from thuchi');
		 	foreach ($result_thuchi as $rows) {
		 		if($rows['thuchi_type'] == 0){
		?>
 					<div class="row" id="table_row">
 						<div class="cell" data-title="Ngày">
 							<?php echo $rows['thuchi_time']; ?>
 						</div>
 						<div class="cell" data-title="Ghi chú">
 							<?php echo $rows['thuchi_note']; ?>
 						</div>
 						<div class="cell" data-title="Thu: SL">
 							1
 						</div>
 						<div class="cell" data-title="Thu: Giá">
 							<?php echo $rows['thuchi_price']; ?>
 						</div>
 						<div class="cell" data-title="Thu: T.Tiền">
 							<?php echo $rows['thuchi_thanhtien']; ?>
 						</div>
 						<div class="cell" data-title="Chi: SL">
 							0
 						</div>
 						<div class="cell" data-title="Chi: Giá">
 							0
 						</div>
 						<div class="cell" data-title="Chi: T.Tiền">
 							0
 						</div>
 						
 					</div>
		<?php } ?>
 		<?php if($rows['thuchi_type'] == 1){ ?>
 		 					<div class="row" id="table_row">
 		 						<div class="cell" data-title="Ngày">
 		 							<?php echo $rows['thuchi_time']; ?>
 		 						</div>
 		 						<div class="cell" data-title="Ghi chú">
 		 							<?php echo $rows['thuchi_note']; ?>
 		 						</div>
 		 						<div class="cell" data-title="Thu: SL">
 		 							0
 		 						</div>
 		 						<div class="cell" data-title="Thu: Giá">
 		 							0
 		 						</div>
 		 						<div class="cell" data-title="Thu: T.Tiền">
 		 							0
 		 						</div>
 		 						<div class="cell" data-title="Chi: SL">
 		 							1
 		 						</div>
 		 						<div class="cell" data-title="Chi: Giá">
 		 							<?php echo $rows['thuchi_price']; ?>
 		 						</div>
 		 						<div class="cell" data-title="Chi: T.Tiền">
 		 							<?php echo $rows['thuchi_thanhtien']; ?>
 		 						</div>
 		 						
 		 					</div>
 				<?php }} ?>

 				</div>
 		</div>
 	</div>
 </div>