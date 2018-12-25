function printDiv() 
{

  var divToPrint=document.getElementById('tbd');
  var divToPrint2=document.getElementById('bb');
  var divToPrint3=document.getElementById('infrm');
  var divToPrint4=document.getElementById('em-profile');

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html><head><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script></head><body onload="window.print()">');

  newWin.document.write('<h1 align="center">CAFEHOUSES</h1><h2>Đơn hàng </h2>'+'</br>'+divToPrint.innerHTML+'</br><h3> Nhân viên : '+divToPrint4.innerHTML+'</h3></br>'+divToPrint3.innerHTML+'</br>'+divToPrint2.innerHTML+'</body></html>');

  newWin.document.close();

  setTimeout(function(){newWin.close();},10);

}


// button vao`
function startup(id) {
   var num = id.replace("tb", "");
  $("div#ordertable").addClass("hidden");
  $("div#detailtable").removeClass("hidden");
  $("div#exchange").removeClass("hidden");
  $("#ban").html(num);
  var ban = "ban" + num;
  var myck = "";
  if ($.cookie("ghep" + ban) != undefined) {
    myck = $.cookie("ghep" + ban);
  } else {
    myck = " ";
  }



  //đổ giữ liệu từ cookie ra bảng
  $.ajax({
    type: 'post',
    url: "ajaxcall.php",
    data: {
      tableid: ban


    },
    success: function(response) {
      if (response == "empty") {
        $('#joindate').html("");
        $('#ordertab').html('<thead><tr><th scope="col">Mã hàng</th><th scope="col">Tên hàng</th><th scope="col">Giá</th><th scope="col">Số lượng</th><th scope="col">Thành tiền</th></tr></thead><tbody id="databody"></tbody>');
        $('table tbody tr td .task input:checkbox').prop('checked', false);
        $('#start').prop('disabled', false);
        $('#totalbill').html(0);
        $('#timesum').html("");
        $('#note').html("");

      } else {
        $('table tbody tr td .task input:checkbox').prop('checked', false);
        
        var obj = JSON.parse(response);
        alert("Nhân viên phụ trách : " + obj.employ);
        $("#joindate").html(obj.datajoin);
        $("#databody").html(obj.table);
        $('#totalbill').html(obj.bill);
        $('#em-profile').html(obj.employ);
        $('#note').html(myck);
        $('#start').prop('disabled', true);
      }

    }
  });




}

function startorder() {
    var tb = $('#ban').html();
    var employee = $('#employ').html();
    var date = new Date().toLocaleString();
     $.ajax({
          type: 'post',
          url: "ajaxcall.php",
          data: {

            startorder:tb,
            employee:employee

          },
          success: function(response) {
              alert("bàn đã được khởi tạo");

                $("#joindate").html(date);
                $('#start').prop('disabled', true);
                $('#em-profile').html(response);
          }
        });
}

// Button ket thuc
function endup() {
  var enddate = new Date().toLocaleString();
  var startdate = $("#joindate").html();
  $("#leftdate").html(enddate);
  startdate = datetoseconds(startdate);
  enddate = datetoseconds(enddate);
  $("#timesum").html(((enddate - startdate) / 60).toFixed(0) + " Phút");

 var ban = $('#ban').html();
 var money = $('#totalbill').html();
 var khachdua = $('#money').val();
 var employee = $('#employ').html();
 var str = '';
  $("#ordertab tr").each(function(){
   str +=$(this).find("td:nth-child(2)").text()+'-';

});
  
     $.ajax({
          type: 'post',
          url: "ajaxcall.php",
          data: {
              endtable:ban,
              employee:employee,
              billtotal:money,
              pos:khachdua,
              menu:str



          },
          success: function(response) {
            alert(response);
            
          }
        });
}

// convert date to seconds
function datetoseconds(startdate) {
  startdate = startdate.split(',')[1];
  startdate = startdate.replace("PM", " ").trim();
  startdate = startdate.replace("AM", " ").trim();
  var a = startdate.split(':'); // split it at the colons
  // minutes are worth 60 seconds. Hours are worth 60 minutes.
  var seconds = (+a[0]) * 60 * 60 + (+a[1]) * 60 + (+a[2]);
  return seconds;
}

// button huy ban
function removedt() {
  var banc = $('#ban').html();
  var tb = "ban" + banc

  $.ajax({
    type: 'post',
    url: "ajaxcall.php",
    data: {
      destroyban: tb


    },
    success: function(response) {

      $('#joindate').html(" ");
      $('#leftdate').html(" ");
      $('#databody').html(" ");
      $('#note').html(" ");
      $('#totalbill').html(0);
      $('table tbody tr td .task input:checkbox').prop('checked', false);
      $('#tb' + banc).css("color", "#0060B6");

      alert(response);
    }
  });

}

//  check box them data table
$(document).ready(function() {

  var tbid = '';

  $(':checkbox').on('change', function() {
    var bill = 0;
    var $this = $(this);
    var str = $this.val();
    var pos = $this.val().indexOf("|");
    var prname = str.substr(0, pos);
    var prprice = str.substr(pos + 1, str.length);
    if (this.checked) {

      $('#databody')
        .append('<tr id="tr_' + $this.data('ref') + '" tabindex="0" data-cb="' + $this.data('ref') + '" class="itemadd iteamqty" style="cursor:pointer;"><td >' + $this.data('ref') + '</td><td class="prname">' + prname + '</td><td >' + prprice + '</td><td class="pr-qty">1</td><td class="prprice">' + prprice + '</td></tr>');
      $('#ordertab tbody tr').each(function() {

        bill += +$('td', this).eq(4).text(); //+ will convert string to number
      });
      $('#totalbill').html(bill);


    } else {

      removeCheckedResult($('.itemadd[data-cb=' + $this.data('ref') + ']'));
      $('#ordertab tbody tr').each(function() {
        bill += +$('td', this).eq(4).text(); //+ will convert string to number
      });
      $('#totalbill').html(bill);
    }

    // var totalChecked = $('input[type=checkbox][class=mainlist]:checked').length >= 2;
    // $('input[type=checkbox][class=mainlist]:not(:checked)').prop('disabled', totalChecked);
  });

  // add data vao input=text
  $(document).on('click', '.iteamqty', function() {
    var price = 0;
    var name = $(this)
      .find(".prname")
      .text();
    var qty2 = $(this).find(".pr-qty").text();


    $('#editqty').val(name);
    $('#qtyvalue').val(qty2);

    tbid = $(this).attr('id');

  });

  $(document).on('click', '#huymon', function() {
    $("#" + tbid).remove();
    $('#editqty').val("   ");
    sendupdate();
  });

  // Tang giam so luong /// flus or sub caculator
  $(document).on('click', '.number-spinner button', function() {
    var btn = $(this),
      oldValue = btn.closest('.number-spinner').find('input').val().trim(),
      newVal = 0;

    var total = 0;
    if (btn.attr('data-dir') == 'up') {
      newVal = parseInt(oldValue) + 1;

    } else {
      if (oldValue > 1) {
        newVal = parseInt(oldValue) - 1;

      } else {
        newVal = 1;
      }
    }
    btn.closest('.number-spinner').find('input').val(newVal);

    // update quantity table data

    $("#" + tbid + " td").eq(3).html(newVal);

    // update price data
    var prqty = $("#" + tbid + " td").eq(2).html();
    prqty *= newVal;
    total += prqty;
    $("#" + tbid + " td").eq(4).html(total);
    sendupdate();

  });


  function sendupdate(){

       var ban = $('#ban').html();
        var joindate = $('#joindate').html();
        var tabledata = $('#databody').html();
        var bill = 0;
        $('#ordertab tbody tr').each(function() {

          bill += +$('td', this).eq(4).text(); //+ will convert string to number
        });
        $('#totalbill').html(bill);
        $.ajax({
          type: 'post',
          url: "ajaxcall.php",
          data: {
            datatable: tabledata,
            ban: ban,
            joindate: joindate

          },
          success: function(response) {

          }
        });
  }
  // uncheck data menu
  function removeCheckedResult($child) {
    $child.remove();
    $('input[class=mainlist][data-ref=' + $child.data('cb') + ']').prop('checked', false).trigger('change');

  }
});



//random color
$(document).ready(function() {
  var colors = ['#03dac6', '#f48fb1', '#ce93d8', '#d1c4e9', '#bbdefb', '#cddc39', '#ffb74d', '#eeeeee', '#b0b3c5'];
  var random_color = colors[Math.floor(Math.random() * colors.length)];
  $('.menu-right').css('background-color', random_color);
});





$(document).ready(function() {
  $(document).on('click', '#setcookie', function() {
    var ban = $('#ban').html();
    var joindate = $('#joindate').html();
    var tabledata = $('#databody').html();
    var money = $('#totalbill').html();
    $("div#ordertable").removeClass("hidden");
    $("div#detailtable").addClass("hidden");
    $("div#exchange").addClass("hidden");


    // var array = [];
    // var headers = [];
    // $('#ordertab thead tr th').each(function(index, item) {
    //     headers[index] = $(item).html();
    // });
    // $('#ordertab tbody tr').has('td').each(function() {
    //     var arrayItem = {};
    //     $('td', $(this)).each(function(index, item) {
    //         arrayItem[headers[index]] = $(item).html();
    //     });
    //     array.push(arrayItem);
    // });

    $.ajax({
      type: 'post',
      url: "ajaxcall.php",
      data: {
        datatable: tabledata,
        ban: ban,
        joindate: joindate,
        bill: money

      },
      success: function(response) {
        if (response == "empty") {
          $('#joindate').html("");
          $('#totalbill').html("");
          $('#ordertab').html('<thead><tr><th scope="col">ST</th><th scope="col">Tên hàng</th><th scope="col">Giá</th><th scope="col">Số lượng</th><th scope="col">Thành tiền</th></tr></thead><tbody id="databody"></tbody>');

        } else {
          $("#tb" + ban).css("color", "#2ecc71");
        }
      }
    });




  });

      $("#money").on("change keyup paste", function(){
        var x = $(this).val(); 
        var total = $("#totalbill").html();
          $("#moneyback").val(x- total);
    
    })
  $(document).on('click', '#chuyenban', function() {
    $('.modal-header #titlemd').html("Chuyển bàn");

  });
  $(document).on('click', '#ghepban', function() {
    $('.modal-header #titlemd').html("Ghép bàn");

  });
  $(document).on('click', '#tachban', function() {
    $('.modal-header #titlemd').html("Tách bàn");

  });
  $(document).on('click', '#confirm', function() {
    var banc = $('#ban').html();
    var action = $('.modal-header #titlemd').html();
    var newbat = $('#optional option:selected').val();
    var oldbat = "ban" + banc;
     var employee = $('#employ').html();


    $.ajax({
      type: 'post',
      url: "ajaxcall.php",
      data: {
        action: action,
        newbat: newbat,
        oldbat: oldbat,
        employee:employee
      },
      success: function(response) {
        if (response == "empty") {
          console.log("lỗi" + response);

        } else {
          alert(response);
          location.reload();
        }
      }

    });

  });
});
//resources.php
