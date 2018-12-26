<script type="text/javascript">
	
	function showdata1(id){
    	
     $.ajax({
        type:'post',
          url: "ajaxcall.php",
        data:{
          typeid1:id
        },
        success:function(response) {
        	$('div.table1 #table_row:not(:first-child)').remove();
        	$('div.table1').append(response);
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
	
	
	 <div class="limiter">
	 	<div class="container-table100">
	 		<div class="wrap-table100">
	 				<div class="table table1" id="table_table">

	 					<div class="row header" id="table_row">
	 						<div class="cell">
	 							Tên hàng hóa
	 						</div>
	 						<div class="cell">
	 							Mã hàng
	 						</div>
	 						<div class="cell">
	 							Đơn vị
	 						</div>
	 						<div class="cell">
	 							Giá bán
	 						</div>
	 						<div class="cell">
	 							Số lượng
	 						</div>
	 						
	 					</div>
	 					<span id="table_row">
	 						
	 					</span>

	 				</div>
	 		</div>
	 	</div>
	 </div>
</div>