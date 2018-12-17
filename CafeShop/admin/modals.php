<script type="text/javascript" >
function showName(typeName,typeID){
      
     $.ajax({
        type:'post',
        dataType: "json",
          url: "ajaxcall.php",
        data:{
          typename:typeName,
          typeid:typeID
        },
        success:function(response) {
          $('.result').val(response.value);
          $('.result2').val(response.value2);
        }
      });
    
}
function typeSubmit(type){
  switch(type){
    case 'add':
    $.ajax({
      type: 'post',
      url: 'ajaxcall.php',
      data: {addType:$('.result').val()},
      success:function(response){
        $('.result').val('');
        if(response == 'true'){
          alert("Insert type success");
          window.location.reload();
        }else{
          alert('This type has already exist');
        }
      }
    });
    break;
    case 'change':
    $.ajax({
      type:'post',
      url:'ajaxcall.php',
      data:{changeType:$('.result').val(),
      changeTypeID:$('.result2').val()
    },
      success:function(response){
        if(response == 'true'){
          alert('Change Success');
          window.location.reload();
        }else{
          alert(response);
        }
      }
    });
    break;
    case 'retype':
    $.ajax({
      type:'post',
      success:function(response){
        $('.result').val('');
        $('.result2').val('');
      }
    });
    break;
    case 'delete':
    if(confirm('Do you want to delete this type?')){
    $.ajax({
      type:'post',
      url:'ajaxcall.php',
      data:{deleteType:$('.result').val()},
      success:function(response){
        if(response == 'true'){
          alert("Delete success!");
          window.location.reload();
        }else{
          alert('Delete not success');
        }
      }
    });
    }
  }
}
function parseName(name,id) {
  $.ajax({
    type:'post',
    url:'ajaxcall.php',
    dataType:'json',
    data:{drinkname:name,drinkID:id},
    success:function(response){
      alert(response.value);
    }
  });
}u
</script>
<div id="modal1" class="modal fade" role="dialog" >
  
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="opacity: 1 !important;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Quản lý nhóm menu thực đơn</h4>
      </div>
      <div class="modal-body col-lg-12 col-md-12 col-xs-12 col-sm-12">
        
        
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label>Tên nhóm hàng hóa</label>
              <ul class="list-unstyled" id="modal_list_type">
              <?php 
                $types = $config->selectData('select * from type_drink');
                foreach ($types as $type) {
                  $typex = '"'.$type['type_name'].'"';
                  
                  echo "<li class='col-md-12 col-lg-12 col-sm-6 col-xs-4'><input type='submit' class='btn btn-default btn-block' onclick='showName(".$typex.",".$type['type_id'].")' value='".$type['type_name']."'/></li>";
                }
               ?>
              </ul>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="result input-sm" name="typemenu_label" value="">
            <input type="hidden" class="result2" name="typemenu_id" value="">
            <div class="btn-group">
              <button class="btn btn-info" name="type_add" onclick="typeSubmit('add');">Thêm mới</button>
              <button class="btn btn-info" name="type_change" onclick="typeSubmit('change');">Thay đổi</button>
              <button class="btn btn-info" name="type_retype" onclick="typeSubmit('retype');">Nhập lại</button>
            </div>
            <button class="btn btn-danger" name="type_delete" onclick="typeSubmit('delete');">Xóa bỏ</button>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="modal2" class="modal fade" role="dialog" >
  
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="opacity: 1 !important;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Quản lý menu thực đơn</h4>
      </div>
      <div class="modal-body col-lg-12 col-md-12 col-xs-12 col-sm-12">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="result input-sm" name="typemenu_label" value="">
            <input type="hidden" class="result2" name="typemenu_id" value="">
            <div class="btn-group">
              <button class="btn btn-info" name="type_add" onclick="typeSubmit('add');">Thêm mới</button>
              <button class="btn btn-info" name="type_change" onclick="typeSubmit('change');">Thay đổi</button>
              <button class="btn btn-info" name="type_retype" onclick="typeSubmit('retype');">Nhập lại</button>
            </div>
            <button class="btn btn-danger" name="type_delete" onclick="typeSubmit('delete');">Xóa bỏ</button>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <label style="display: inline;">Tên hàng hóa <span class="badge">S.L</span></label>
                <div class="list-group" id="modal_list_type">
                <?php 
                  $drinks = $config->selectData('select * from drink');
                  foreach ($drinks as $drink) {
                    $drinkx = '"'.$drink['drink_name'].'"';
                    
                    echo "<a onclick='parseName(".$drinkx.",".$drink['type_id'].")' class='col-md-12 col-lg-12 col-sm-6 col-xs-4 list-group-item'>".$drink['drink_name']."<span class='badge badge-secondary'>".$drink['quantity']."</span></a>";
                  }
                 ?>
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