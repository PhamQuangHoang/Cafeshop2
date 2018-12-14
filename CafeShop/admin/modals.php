<script type="text/javascript" >
function showdata(id){
      
     $.ajax({
        type:'post',
          url: "ajaxcall.php",
        data:{
          typename:id
        },
        success:function(response) {
          $('.result').html(response);
        }
      });
    
}


</script>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="result">
      
    </div>
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Quản lý nhóm menu thực đơn</h4>
      </div>
      <div class="modal-body">
        
        <div class="container col-lg-12 col-md-12 col-xs-12 col-sm-12">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" width="50%">
            <label>Tên nhóm hàng hóa</label>
              <ul class="list-unstyled">
              <?php 
                $types = $config->selectData('select * from type_drink');
                foreach ($types as $type) {
                  echo '<li><input type="submit" class="btn-group-justified list-group-item" onclick="showdata('.$type['type_name'].');"  id="'.$type['type_name'].'" name="choose_resources_type" value="'.$type['type_name'].'" /></li>';
                }
               ?>
              </ul>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            
            <div class="btn-group">
              <button>Thêm mới</button>
              <button>Thay đổi</button>
              <button>Nhập lại</button>
              <button>Xóa bỏ</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>