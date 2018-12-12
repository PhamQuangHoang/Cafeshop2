$(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();

    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);

        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

    });
    // $(".success").click(function (e) {
    //     var $active = $('.wizard .nav-tabs li.active');
    //     var $custName = $('#custName').val();
    //     var custaddress = $('#custaddress').val();
    //     var custphone = $('#custphone').val();
    //     var custmessage = $('#custmessage').val();
    //
    //     $.ajax({
    //       type:'post',
    //         url: "paymentaction.php",
    //       data:{
    //          custName:custName,
    //          custaddress:custaddress,
    //          custphone:custphone,
    //          custmessage:custmessage
    //
    //
    //       },
    //       success:function(response) {
    //         alert(response);
    //         $active.next().removeClass('disabled');
    //         nextTab($active);
    //       }
    //     });
    //
    //
    //
    // ==});
    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });
});

function finish() {

      var $active = $('.wizard .nav-tabs li.active');
      var custName = $('#custName').val();
      var custaddress = $('#custaddress').val();
      var custphone = $('#custphone').val();
      var custmessage = $('#custmessage').val();
      var custemail =$('#custemail').val();

      $.ajax({
        type:'post',
          url:'paymentaction.php',
        data:{
           custName:custName,
           custaddress:custaddress,
           custphone:custphone,
           custemail:custemail,
           status:"chờ xác nhận",
           custmessage:custmessage

        },
        success:function(response) {
          alert(response);
          $active.next().removeClass('disabled');
          nextTab($active);
        }
      });

   }

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}


$('#contact-form').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            Name: {
                validators: {
                    notEmpty: {
                        message: 'The Name is required and cannot be empty'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required'
                    },
                    emailAddress: {
                        message: 'The email address is not valid'
                    }
                }
            },
            Message: {
                validators: {
                    notEmpty: {
                        message: 'The Message is required and cannot be empty'
                    }
                }
            }
        }
    });

function removecart(id){
    var removeid =  '#'+id;
   $.ajax({
        type:'post',
          url:'paymentaction.php',
        data:{
           removecart:id
        },
        success:function(response) {
          alert(response);
          location.reload();
        
        }
      });




}