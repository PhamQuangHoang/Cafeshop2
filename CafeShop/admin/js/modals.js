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
  $('#modal78_submit').click(function(){
    if(confirm('Bạn có muốn thực hiện hành động này ?')){
      $.ajax({
        type:'post',
        url:"ajaxcall.php",
        data:{
          modal78_name_kh: $('#modal78_name_kh').val(),
          modal78_address: $('#modal78_address').val(),
          modal78_number: $('#modal78_number').val(),
          modal78_textarea: $('#modal78_textarea').val(),
          modal78_thuchi_type: $('#thuchi_type').html(),
          modal78_price: $('#modal78_price').val()
        },
        success:function(){
          alert('Success!');
          $('#modal78').modal('hide');
        }
      });
    }
  });
  $('#btn-info-create').click(function(){
    $.ajax({
      type:'post',
      url:'ajaxcall.php',
      data:{
        info_create:'create',
        info_name:$('#info_name').val(),
        info_vat:$('#info_vat').val(),
        info_bankid:$('#info_bankid').val(),
        info_bank:$('#info_bank').val(),
        info_address:$('#info_address').val(),
        info_hotline:$('#info_hotline').val()
      },
      success:function(){
        alert('Tạo thành công !');
      }
    });
  });
  $('#btn-info-update').click(function(){
    $.ajax({
      type:'post',
      url:'ajaxcall.php',
      data:{
        info_update:'update',
        info_name:$('#info_name').val(),
        info_vat:$('#info_vat').val(),
        info_bankid:$('#info_bankid').val(),
        info_bank:$('#info_bank').val(),
        info_address:$('#info_address').val(),
        info_hotline:$('#info_hotline').val()
      },
      success:function(){
        alert('Cập Nhật thành công !');
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
function parseName6(id){
  $.ajax({
    type:'post',
    url:'ajaxcall.php',
    dataType:'json',
    data:{modal6_table_id:id},
    success:function(response){
      // alert(response);
      $('#modal61-table').append(response.tdtable);
      $('#modal61-tddetail').append(response.tddetail);
      $('#modal61-tddetail').append("<tr><td></td><td></td><td></td><td style='background-color:yellow;'>"+response.sumprice+"</td>");
      $('#modal61').modal('show');
    }
  });
}
function SubmitThuChi(){
  
}