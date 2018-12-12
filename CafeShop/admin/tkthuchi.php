<div class="row panel-heading">
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
			Ngày
		</div>
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
			Ghi chú
		</div>
	</div>
	<div class="col-lg-8 col-md-8 col-sm-6 col-xs-6">
		
		<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
			Thu: SL
		</div>
		<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
			Thu: Giá
		</div>
		<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
			Thu: T.Tiền
		</div>
		<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
			Chi: SL
		</div>
		<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
			Chi: Giá
		</div>
		<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
			Chi: T.Tiền
		</div>
	</div>
	
</div>
<?php $config = new Config();
	$result_thuchi = $config->selectData('select * from thuchi');
 	foreach ($result_thuchi as $rows) {
		

 ?>
 <?php if($rows['thuchi_type'] == 0){ ?>
<div class="row bg-success">
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
			<?php echo $rows['thuchi_time']; ?>
		</div>
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
			<?php echo $rows['thuchi_note']; ?>
		</div>
	</div>
	<div class="col-lg-8 col-md-8 col-sm-6 col-xs-6">
		
		<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
			1
		</div>
		<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
			<?php echo $rows['thuchi_price']; ?>
		</div>
		<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
			<?php echo $rows['thuchi_thanhtien']; ?>
		</div>
		<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
			0
		</div>
		<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
			0
		</div>
		<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
			0
		</div>
	</div>
</div>
<?php }
	if($rows['thuchi_type'] == 1) {
?>
<div class="row bg-info">
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
		 	<?php echo $rows['thuchi_time']; ?>
		</div>
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
		 	<?php echo $rows['thuchi_note']; ?>
		</div>
	</div>
	<div class="col-lg-8 col-md-8 col-sm-6 col-xs-6">
		<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
			0
		</div>
		<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
			0
		</div>
		<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
			0
		</div>
		<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
			1
		</div>
		<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
			<?php echo $rows['thuchi_price']; ?>
		</div>
		<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
			<?php echo $rows['thuchi_thanhtien']; ?>
		</div>
	</div>
</div>
<?php } ?>
<?php
} ?>