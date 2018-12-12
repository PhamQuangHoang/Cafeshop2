
    $(document).ready(function(){

      $.ajax({
        type:'post',
          url: "shoping.php",
        data:{
          totalcart:"cart"
        },
        success:function(response) {
          document.getElementById("mycart").innerHTML=response;
        }
      });



    });
   function showorder(id){
    
      var img=document.getElementById(id+"_img").src;
      var name=document.getElementById(id+"_name").innerHTML;
      var price=document.getElementById(id+"_price").innerHTML;

     
      $('.proname').html(name);
      $('.proprice').html(price);
      $(".proimg").attr("src",img);
      $('#showorder').removeClass('hidden');
      $('#result_div').html(" ");
      on();
}
 

    
//send ajax to shoping and get count order
 function cart() {
     
      
      var name= $('.proname').html();
      var price= $('.proprice').html();
      var size = $("#small").is(':checked') ? "size nhỏ(475ml)" : "size vừa(600ml)";
      var note = $('#note').val();
      var quantity = $('#proNum').val();
      // var count = <?php echo count($_SESSION['name']); ?> ;
    
      $.ajax({
        type:'post',
        url:'shoping.php',
        data:{
          item_name:name,
          item_price:price,
          item_size:size,
          item_quantity:quantity,
          item_note:note
        }, beforeSend: function(){
       
            $('#image').removeClass('hidden');

        },
        complete: function(){
            $('#image').addClass('hidden');
          
        
        },
        success:function(response) {
          $('#overlay-body').css("display","none");
            $('#showorder').addClass('hidden');
            document.getElementById("mycart").innerHTML=response;


         }
      });
    
    }
      
    

    //checkbox active
     $(document).on('click', 'input[type="checkbox"]', function() {      
        $('input[type="checkbox"]').not(this).prop('checked', false);      
      });
    // plus or sub in showorder
     $(function() {
          $(".button").on("click", function() {

            var $button = $(this);
            var oldValue = $button.parent().find("input").val();

            if ($button.text() == "+") {
              var newVal = parseFloat(oldValue) + 1;
            } else {
               // Don't allow decrementing below zero
              if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
                } else {
                newVal = 0;
              }
             }

            $button.parent().find("input").val(newVal);

          });

});
      function off() {
                $('#showorder').addClass('hidden');
             // $("#mycart").fadeOut();
      $('#overlay-body').css("display","none");
}
        function off2() {
    $('.search_result').html(' <tbody id="result_div"></tbody>');
      $('#overlay-body2').css("display","none");
}
function on(){
     $('#overlay-body').css("display","block");
}

    function search(){
        var searchText = $('#search-icon').val();
        $.ajax({
              type:'post',
              url:'shoping.php',
              data:{
               search:"search",
               search_Text:searchText
              },
              success:function(response) 
              {
               document.getElementById("result_div").innerHTML=response;
               $('#overlay-body2').css("display","block");
              }
             });
 
 return false;

    }


