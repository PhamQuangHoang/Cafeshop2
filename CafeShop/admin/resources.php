<script type="text/javascript" >
function showdata(id){
    	
     $.ajax({
        type:'post',
          url: "ajaxcall.php",
        data:{
          typeid2:id
        },
        success:function(response) {
        	
          $('#table_table #table_row:not(:first-child)').remove();
        $('div[name=table_table2]').append(response);
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
	<div class="limiter">
	 	<div class="container-table100">
	 		<div class="wrap-table100">
	 				<div class="table" id="table_table" name="table_table2">

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
	 							Giá mua
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