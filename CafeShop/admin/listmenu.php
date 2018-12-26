<script type="text/javascript">
	
	function showdata1(id){
    	
     $.ajax({
        type:'post',
          url: "ajaxcall.php",
        data:{
          typeid1:id
        },
        success:function(response) {
          $('.result1').html(response);
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
		
		<?php foreach ($result as $rows) { 
			echo '<li><button class="btn btn-default col-lg-12 col-md-6 col-sm-3 col-xs-4" name="choose_menu" value="'.$rows['type_name'].'" onclick="showdata1('.$rows['type_id'].');">'.$rows['type_name'].'</button>
							
						</li>';
		} ?>
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
			<p class="text-center">Giá bán</p>
		</div>
		<div class="col-lg-3 col-md-2 col-sm-2 col-xs-4 menu-right-head">
			<p class="text-center">Số lượng</p>
		</div>
	</div>
	
	<div class="result1"></div>
</div>