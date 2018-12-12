<?php $config = new Config();
	$result_bill = $config->selectData('select * from bill');
	$i = 1;
 ?>
<div class="row">
	<div class="col-lg-1 col-md-1 col-sm-2 col-xs-2 bg-danger">
		STT
	</div>
	<div class="col-lg-11 col-md-11 col-sm-10 col-xs-10">
		<div class="col-lg-1 col-md-1 col-sm-2 col-xs-2 bg-info">
			Bàn
		</div>
		<div class="col-lg-1 col-md-1 col-sm-3 col-xs-3 bg-primary">
			Nhân viên
		</div>
		<div class="col-lg-2 col-md-2 col-sm-3 col-xs-3 bg-success">
			Thực đơn
		</div>
		<div class="col-lg-1 col-md-1 col-sm-2 col-xs-2 bg-warning">
			Phụ thu
		</div>
		<div class="col-lg-1 col-md-1 col-sm-2 col-xs-2 bg-danger">
			Giảm giá	
		</div>
		<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 bg-info">
			T.Tiền
		</div>
		<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 bg-primary">
			Nhận
		</div>
		<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 bg-warning">
			Thời gian
		</div>	
	</div>
	
</div>
<?php foreach ($result_bill as $rows) {
?>
<div class="row">
	<div class="col-lg-1 col-md-1 col-sm-2 col-xs-2 bg-danger">
		<?php echo $i++; ?>
	</div>
	<div class="col-lg-11 col-md-11 col-sm-10 col-xs-10">
		<div class="col-lg-1 col-md-1 col-sm-2 col-xs-2 bg-info">
			Bàn <?php echo $rows['bill_table']; ?>
		</div>
		<div class="col-lg-1 col-md-1 col-sm-3 col-xs-3 bg-primary">
			<?php echo $rows['bill_employee']; ?>
		</div>
		<div class="col-lg-2 col-md-2 col-sm-3 col-xs-3 bg-success">
			<?php echo $rows['bill_drinks']; ?>
		</div>
		<div class="col-lg-1 col-md-1 col-sm-2 col-xs-2 bg-warning">
			<?php echo $rows['bill_phuthu']; ?>
		</div>
		<div class="col-lg-1 col-md-1 col-sm-2 col-xs-2 bg-danger">
			<?php echo $rows['bill_sale']; ?>%
		</div>
		<div class="clearfix visible-xs visible-sm"></div>
		<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 bg-info">
			<?php echo $rows['bill_price']; ?>
		</div>
		<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 bg-primary">
			<?php echo $rows['bill_moneytaked']; ?>
		</div>
		<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 bg-warning">
			<?php echo $rows['bill_time']; ?>
		</div>	
	</div>
	
</div>
<?php } ?>