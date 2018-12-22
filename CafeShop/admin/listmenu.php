<!-- <script type="text/javascript" src="js/qlban.js">
</script> -->
<?php require_once 'config.php';
	$config = new Config;
	$result = $config->selectData('select * from type_drink');
  ?>
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
	<ul class="list-group list-unstyled">
		<li style="font-weight: bold;">TÊN NHÓM HÀNG HÓA</li>
		<?php foreach ($result as $rows) { ?>
			<form action="" method="POST">
			<?php echo '<li><input type="submit" class="btn btn-block btn-default" name="choose_menu" value="'.$rows['type_name'].'" />
							<input type="hidden" name="type_id" value="'.$rows['type_id'].'" />
						</li>'; ?>
			</form>
		<?php } ?>
	</ul>
</div>
<div class="col-lg-9 col-md-9 col-sm-12 cl-xs-12" style="margin-top:20px;">
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 menu-right-head">
			<p class="text-center">Tên hàng hóa</p>
		</div>
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 menu-right-head">
			<p class="text-center">Mã hàng</p>
		</div>
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 menu-right-head">
			<p class="text-center">Đơn vị</p>
		</div>
		<div class="col-lg-2 col-md-3 col-sm-3 col-xs-4 menu-right-head">
			<p class="text-center">Giá bán</p>
		</div>
		<div class="col-lg-3 col-md-2 col-sm-2 col-xs-4 menu-right-head">
			<p class="text-center">Số lượng</p>
		</div>
	</div>
	
	<?php if(isset($_POST['choose_menu'])){
		$result_right = $config->selectData('select * from drink where type_id = '.$_POST['type_id']);
		foreach ($result_right as $rows_right) {
		
	?>
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 menu-right">
		<?php echo $rows_right['drink_name'] ?>
	</div>
	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 menu-right">
		<?php echo $rows_right['drink_id'] ?>
	</div>
	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 menu-right">
		<?php echo $rows_right['unit'] ?>
	</div>
	<div class="col-lg-2 col-md-3 col-sm-3 col-xs-4 menu-right">
		<?php echo $rows_right['price'] ?>
	</div>
	<div class="col-lg-3 col-md-2 col-sm-2 col-xs-4 menu-right">
		<?php echo $rows_right['quantity'] ?>
	</div>

	<?php 
		}
	 } ?>
</div>