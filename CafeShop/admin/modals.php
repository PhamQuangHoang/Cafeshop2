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
  $("select#modal4-product-type").change(function(){
    var type = $(this).val();
    $.ajax({
      type: "POST",
      url: "ajaxcall.php",
      data: {
        modal4_type_name:type
      },
      success:function(response){
        $("#modal4-list-type").html(response);
      }
    });
  });
  $("select#modal5-product-type").change(function(){
    var type = $(this).val();
    $.ajax({
      type: "POST",
      url: "ajaxcall.php",
      data: {
        modal5_type_name:type
      },
      success:function(response){
        $("#modal5-list-type").html(response);
      }
    });
  });
  $(document).on('click',"table#modal5-table tr",function(){
      $(this).addClass('selected').siblings().removeClass('selected');    
      var name=$(this).find('td:nth-child(2)').html();
      var quantity=$(this).find('td:nth-child(5)').html();
      $('#modal5-name-table').html(name);

  });
  $('#modal5-set-btn').click(function(){
    var newquantity = $('#modal5-set-quantity').val();
    $("table#modal5-table tr.selected").find('td:nth-child(5)').html(newquantity);
    var newprice = $("table#modal5-table tr.selected").find('td:nth-child(4)').html();
    $("table#modal5-table tr.selected").find('td:nth-child(6)').html(newquantity*newprice);
    var sumprice = 0;
    $("table#modal5-table tr").find('td:nth-child(6)').each(function(){
      var price = $(this).html();
      sumprice += parseInt(price);
    });
    $("#modal5-sum-price").html(sumprice);
  });
  
  $('#modal5-cancel-btn').click(function(){
    
    $("table#modal5-table tr.selected").nextAll('tr').each(function(){
      var stt = $(this).find('td:nth-child(1)').html();
      $(this).find('td:nth-child(1)').html(parseInt(stt)-1);
    });
    $("table#modal5-table tr.selected").remove();
    $('#modal5-name-table').html('None');
    $('#modal5-set-quantity').val(1);
    var sumprice = 0;
    $("table#modal5-table tr").find('td:nth-child(6)').each(function(){
      var price = $(this).html();
      sumprice += parseInt(price);
    });
    $("#modal5-sum-price").html(sumprice);
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
function parseName4(name,id) {
  $.ajax({
    type:'post',
    url:'ajaxcall.php',
    dataType:'json',
    data:{srcname:name,srcID:id},
    success:function(response){
      $("#modal4-product-name").val(response.name);
      srcid = response.id;
      $("#modal4-product-id").val(response.id);
      $("#modal4-product-unit").val(response.unit);
      $("#modal4-product-buy").val(response.price);
      $("#modal4-product-quantity").val(response.quantity);
      
    }
  });
}
function modal4Submit(type){
  switch(type){
    case 'add':
    $.ajax({
      type: 'post',
      url: 'ajaxcall.php',
      data: {
        modal4SubmitType:"add",
        modal4_product_type:$("#modal4-product-type").val(),
        modal4_product_name:$("#modal4-product-name").val(),
        
        modal4_product_id:$("#modal4-product-id").val(),
        modal4_product_unit:$("#modal4-product-unit").val(),
        modal4_product_price:$("#modal4-product-buy").val(),
        modal4_product_quantity:$("#modal4-product-quantity").val()
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
        modal4SubmitType:"change",
        modal4_product_type:$("#modal4-product-type").val(),
        modal4_product_name:$("#modal4-product-name").val(),
        modal4_product_id_old:srcid,
        modal4_product_id_new:$("#modal4-product-id").val(),
        modal4_product_unit:$("#modal4-product-unit").val(),
        modal4_product_price:$("#modal4-product-buy").val(),
        modal4_product_quantity:$("#modal4-product-quantity").val()
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
      $("#modal4-product-type").val($('#modal4-product-type option:first').val());
      $("#modal4-product-name").val('');
      $("#modal4-product-id").val('');
      $("#modal4-product-unit").val('');
      
      $("#modal4-product-buy").val('');
      $("#modal4-product-quantity").val('');
    break;
    case 'delete':
    if(confirm('Do you want to delete this drink?')){
    $.ajax({
      type:'post',
      url:'ajaxcall.php',
      data:{
        modal4SubmitType:"delete",
        modal4_product_name:$("#modal4-product-name").val(),
        modal4_product_id:$("#modal4-product-id").val()
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
var i=1;
function parseName5(name,id) {
  $.ajax({
    type:'post',
    url:'ajaxcall.php',
    dataType:'json',
    data:{modal5srcname:name,modal5srcID:id},
    success:function(response){
      var html = '';
      html += "<tr><td>"+i+"</td><td>"+response.name+"</td><td>"+response.unit+"</td><td>"+response.price+"</td><td>"+1+"</td><td>"+response.price*1+"</td></tr>";
      $('#modal5-table').append(html);
      i++;
      var sumprice = 0;
      $("table#modal5-table tr").find('td:nth-child(6)').each(function(){
        var price = $(this).html();
        sumprice += parseInt(price);
        
      });
      $("#modal5-sum-price").html(sumprice);
    }
  });
}
function btnImport(){
  var modal5_src_quantity = [];
  var modal5_src_price = [];
  var modal5_src_name = [];
  var i = -1;
  $("table#modal5-table tr").each(function(){
    modal5_src_quantity[i] = $(this).find('td:nth-child(5)').html();
    modal5_src_price[i] = $(this).find('td:nth-child(6)').html();
    modal5_src_name[i] = $(this).find('td:nth-child(2)').html();
    i++;
  });
  $.ajax({
    type:'post',
    url:'ajaxcall.php',
    data:{
      modal5_seller:$('#modal5-seller').val(),
      modal5_seller_address:$('#modal5-seller-address').val(),
      modal5_seller_number:$('#modal5-seller-number').val(),
      modal5_src_quantity:modal5_src_quantity,
      modal5_src_price:modal5_src_price,
      modal5_src_name:modal5_src_name
    },
    success:function(response){
      alert(response);
      $('#modal5-table tr td').remove();
      $('#modal5-sum-price').html('0d');
      $('#modal5-name-table').html('None');
    }
  });
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

<div id="modal4" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="opacity: 1 !important;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thêm nguyên liệu</h4>
      </div>
      <div class="modal-body col-lg-12 col-md-12 col-xs-12 col-sm-12">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 modal2-left">
            <div class="row">
              <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                <span class="text-warning" style="white-space: nowrap;">Thuộc nhóm:</span>
              </div>
              <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                <select class="form-control" name="modal4-product-type" id="modal4-product-type">
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
                <span class="text-warning" style="white-space: nowrap;">Tên hàng:</span>
              </div>
              <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                <input type="text" name="modal4-product-name" class="input-sm" id="modal4-product-name">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                <span class="text-warning" style="white-space: nowrap;">Ảnh:</span>
              </div>
              <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                <input type="file" name="modal4-product-image" accept="image/*" id="modal4-product-image">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                <span class="text-warning" style="white-space: nowrap;">Mã hàng:</span>
              </div>
              <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                <input type="text" class="input-sm" name="modal4-product-id" id="modal4-product-id">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                <span class="text-warning" style="white-space: nowrap;">Đơn vị tính:</span>
              </div>
              <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                <input type="text" class="input-sm" name="modal4-product-unit" id="modal4-product-unit">
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                <span class="text-warning" style="white-space: nowrap;">Giá mua:</span>
              </div>
              <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                <input type="text" class="input-sm" name="modal4-product-buy" id="modal4-product-buy">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                <span class="text-warning" style="white-space: nowrap;">Số lượng:</span>
              </div>
              <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                <input type="text" class="input-sm" name="modal4-product-quantity" id="modal4-product-quantity">
              </div>
            </div>
            
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <br>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <label style="display: inline;">Tên hàng hóa <span class="badge">S.L</span></label>
                <div class="list-group" id="modal4-list-type">
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
            <button class="btn btn-primary" name="type_add4" onclick="modal4Submit('add');">Thêm mới</button>
            <button class="btn btn-info" name="type_change4" onclick="modal4Submit('change');">Thay đổi</button>
            <button class="btn btn-info" name="type_retype4" onclick="modal4Submit('retype');">Nhập lại</button>
            <button class="btn btn-danger" name="type_delete4" onclick="modal4Submit('delete');">Hủy nguyên liệu</button>
          </div>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>

  </div>
</div>

<div id="modal5" class="modal fade" role="dialog" >
  
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Nhập kho nguyên liệu</h4>
      </div>
      <div class="modal-body col-lg-12 col-md-12 col-xs-12 col-sm-12" id="modal5-body">
          <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
              <span class="text-primary">Đơn vị bán</span>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
              <input type="text" class="input-sm" name="modal5-seller" id="modal5-seller" value="">
            </div>
          </div>
          <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
              <span class="text-primary">Địa chỉ</span>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
              <input type="text" class="input-sm" name="modal5-seller-address" id="modal5-seller-address" value="">
            </div>
          </div>
          
          <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
              <span class="text-primary">Số điện thoại</span>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
              <input type="text" class="input-sm" name="modal5-seller-number" id="modal5-seller-number" value="">
            </div>
          </div>
          
          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" >
            <table class="table-striped table-bordered" id="modal5-table" width="100%">
              <tr>
                <th>ST</th>
                <th>Tên hàng hóa</th>
                <th>Unit</th>
                <th>Giá mua</th>
                <th>SL</th>
                <th>T.Tiền</th>
              </tr>
              
            </table>
            <div class="row" style="margin-top: 10px;">
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <label id="modal5-name-table">None</label>
              </div>

                <input type="number" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 input-sm" name="modal5-set-quantity" id="modal5-set-quantity" value="1">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <label class="col-lg-6 col-md-6 col-xs-6 col-sm-6">Tổng tiền: </label>
                <label id="modal5-sum-price" class="col-lg-6 col-md-6 col-xs-6 col-sm-6">0d</label>
              </div>
              <div class="btn-group btn-group-justified" style="padding:10px 20px 0px 20px;">
                
                  <a href="#" class="btn btn-default" id="modal5-set-btn">Đặt số lượng</a>
                  <a href="#" class="btn btn-default btn-success" onclick="btnImport();" id="modal5-import-btn">Nhập kho</a>
                  <a href="#" class="btn btn-default btn-warning" id="modal5-cancel-btn">Hủy bỏ</a>
                
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 modal5-left">
            <div class="row">
              <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                <span class="text-left text-primary">Nhóm</span>
              </div>
              <div class="col-lg-8 col-md-8 col-xs-8 col-sm-8">
                <select class="form-control" name="modal5-product-type" id="modal5-product-type">
                  <option value="all">Tất cả</option>
                  <?php
                    foreach ($types as $type) {
                    echo "<option value='".$type['type_name']."'>".$type['type_name']."</option>";
                    }
                  ?>
                </select>
              </div>
            </div>
            <div class="row" style="padding: 5px 0px 0px 10px;">
              <input type="text" class="input-sm col-lg-9 col-md-9 col-sm-9 col-xs-9" name="modal5-search" id="modal5-search" value="">
              <input type="submit" class="btn btn-default col-lg-3 col-md-3 col-sm-3 col-xs-3" name="modal5-search-btn" id="modal5-search-btn" value="Tìm">
            </div>
              <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                <span class="text-primary">Tên hàng hóa</span>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <span class="text-primary">S.Lượng</span>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="modal5-list-type">
                
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>