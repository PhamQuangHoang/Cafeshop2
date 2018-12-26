<script type="text/javascript" >
function showdata(id){
    	
     $.ajax({
        type:'post',
          url: "ajaxcall.php",
        data:{
          typeid2:id
        },
        success:function(response) {
          $('.result2').html(response);
        }
      });
    
}


</script>
<?php require_once 'config.php';
	$config = new Config;
	$result = $config->selectData('select * from type_drink');
  ?>
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
	<ul class="list-group list-unstyled">
		<li style="font-weight: bold;">TÊN NHÓM HÀNG HÓA</li>
		<?php foreach ($result as $rows) { ?>
			
			<?php echo '<li><input type="submit" class="btn btn-block btn-default" onclick="showdata('.$rows['type_id'].');"  id="'.$rows['type_id'].'" name="choose_resources_type" value="'.$rows['type_name'].'" />
							
						</li>'; ?>
			
		<?php } ?>
	</ul>
</div>
<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" style="margin-top:20px;">
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
			<p class="text-center">Giá mua</p>
		</div>
		<div class="col-lg-3 col-md-2 col-sm-2 col-xs-4 menu-right-head">
			<p class="text-center">Số lượng</p>
		</div>
	</div>
	
	<div class="result2">
		



	</div>
</div>