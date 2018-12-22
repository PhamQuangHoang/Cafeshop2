<script type="text/javascript" >
  var drinkid = '';
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
      $("#modal2-product-name").val(response.name);
      drinkid = response.id;
      $("#modal2-product-id").val(response.id);
      $("#modal2-product-unit").val(response.unit);
      $("#modal2-product-sell").val(response.price);
      $("#modal2-product-quantity").val(response.quantity);
    }
  });
}
$(document).ready(function(){
  $("select#modal2-product-type").change(function(){
    var type = $(this).val();
    $.ajax({
      type: "POST",
      url: "ajaxcall.php",
      data: {
        modal2_type_name:type
      },
      success:function(response){
        $("#modal2-list-type").html(response);
      }
    });
  });
});
function modal2Submit(type){
  switch(type){
    case 'add':
    $.ajax({
      type: 'post',
      url: 'ajaxcall.php',
      data: {
        modal2SubmitType:"add",
        modal2_product_type:$("#modal2-product-type").val(),
        modal2_product_name:$("#modal2-product-name").val(),
        
        modal2_product_id:$("#modal2-product-id").val(),
        modal2_product_unit:$("#modal2-product-unit").val(),
        modal2_product_price:$("#modal2-product-sell").val(),
        modal2_product_quantity:$("#modal2-product-quantity").val()
      },
      success:function(response){
        if(response == 'true'){
          alert("Insert type success");
          window.location.reload();
        }else{

          alert(response);
          alert('This type has already exist');
        }
      }
    });
    break;
    case 'change':
    $.ajax({
      type:'post',
      url:'ajaxcall.php',
      data:{
        modal2SubmitType:"change",
        modal2_product_type:$("#modal2-product-type").val(),
        modal2_product_name:$("#modal2-product-name").val(),
        modal2_product_id_old:drinkid,
        modal2_product_id_new:$("#modal2-product-id").val(),
        modal2_product_unit:$("#modal2-product-unit").val(),
        modal2_product_price:$("#modal2-product-sell").val(),
        modal2_product_quantity:$("#modal2-product-quantity").val()
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
      $("#modal2-product-type").val($('#modal2-product-type option:first').val());
      $("#modal2-product-name").val('');
      $("#modal2-product-id").val('');
      $("#modal2-product-unit").val('');
      $("#modal2-product-sell").val('');
      $("#modal2-product-buy").val('');
      $("#modal2-product-quantity").val('');
    break;
    case 'delete':
    if(confirm('Do you want to delete this drink?')){
    $.ajax({
      type:'post',
      url:'ajaxcall.php',
      data:{
        modal2SubmitType:"delete",
        modal2_product_name:$("#modal2-product-name").val(),
        modal2_product_id:$("#modal2-product-id").val()
    },
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

<div id="modal2" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="opacity: 1 !important;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Quản lý menu thực đơn</h4>
      </div>
      <div class="modal-body col-lg-12 col-md-12 col-xs-12 col-sm-12">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 modal2-left">
            <div class="row">
              <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                <span class="text-primary" style="white-space: nowrap;">Thuộc nhóm:</span>
              </div>
              <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                <select class="form-control" name="modal2-product-type" id="modal2-product-type">
                  <option value="all">Tất cả</option>
                  <?php
                    foreach ($types as $type) {
                    echo "<option value='".$type['type_name']."'>".$type['type_name']."</option>";
                    }
                  ?>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                <span class="text-primary" style="white-space: nowrap;">Tên hàng:</span>
              </div>
              <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                <input type="text" name="modal2-product-name" class="input-sm" id="modal2-product-name">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                <span class="text-primary" style="white-space: nowrap;">Ảnh:</span>
              </div>
              <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                <input type="file" name="modal2-product-image" accept="image/*" id="modal2-product-image">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                <span class="text-primary" style="white-space: nowrap;">Mã hàng:</span>
              </div>
              <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                <input type="text" class="input-sm" name="modal2-product-id" id="modal2-product-id">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                <span class="text-primary" style="white-space: nowrap;">Đơn vị tính:</span>
              </div>
              <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                <input type="text" class="input-sm" name="modal2-product-unit" id="modal2-product-unit">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                <span class="text-primary" style="white-space: nowrap;">Giá bán:</span>
              </div>
              <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                <input type="text" class="input-sm" name="modal2-product-sell" id="modal2-product-sell">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                <span class="text-primary" style="white-space: nowrap;">Giá mua:</span>
              </div>
              <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                <input type="text" class="input-sm" name="modal2-product-buy" id="modal2-product-buy">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                <span class="text-primary" style="white-space: nowrap;">Số lượng:</span>
              </div>
              <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                <input type="text" class="input-sm" name="modal2-product-quantity" id="modal2-product-quantity">
              </div>
            </div>
            
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <br>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <label style="display: inline;">Tên hàng hóa <span class="badge">S.L</span></label>
                <div class="list-group" id="modal2-list-type">
                <!-- <?php 
                  $drinks = $config->selectData('select * from drink');
                  foreach ($drinks as $drink) {
                    $drinkx = '"'.$drink['drink_name'].'"';
                    
                    echo "<a onclick='parseName(".$drinkx.",".$drink['type_id'].")' class='col-md-12 col-lg-12 col-sm-6 col-xs-4 list-group-item'>".$drink['drink_name']."<span class='badge badge-secondary'>".$drink['quantity']."</span></a>";
                  }
                 ?> -->
                </div>  
            </div>
            
          </div>
      </div>
      <div class="modal-footer">
        <div class="row" style="margin: auto">
          <div class="btn-group">
            <button class="btn btn-primary" name="type_add" onclick="modal2Submit('add');">Thêm mới</button>
            <button class="btn btn-info" name="type_change" onclick="modal2Submit('change');">Thay đổi</button>
            <button class="btn btn-info" name="type_retype" onclick="modal2Submit('retype');">Nhập lại</button>
            <button class="btn btn-danger" name="type_delete" onclick="modal2Submit('delete');">Xóa bỏ</button>
          </div>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>

  </div>
</div>