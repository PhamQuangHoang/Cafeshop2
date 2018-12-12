  
 <?php 

include("config2.php");
$con = new Connect("admincafe");
    
    
?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript">
                function checkAC(){
                  // Get the checkbox
                      var checkBox = document.getElementById("myCheck");
                      // Get the output text
                      var btn_regis = document.getElementById("regisbtn");

                      // If the checkbox is checked, display the output text
                      if (checkBox.checked == true){
                         btn_regis.disabled = false;
                      } else {

                         btn_regis.disabled = true;
                      }
                }
            </script>


</head>


<body>    
      <div class="content">
              <div class="container-fluid bg-light py-3">
                <div class="row">
                    <div class="col-lg-4 col-md-6 mx-auto">
                            <div class="card card-body">
                                <h3 class="text-center mb-4">ĐĂNG KÍ</h3>
                              <form action="" method="post" accept-charset="utf-8">
                                  <div class="alert alert-danger">
                                    <a class="close font-weight-light" data-dismiss="alert" href="#">×</a><span>&nbsp;<?php 
                                    $errormsg = array();
                                        if(isset($_POST['regis'])){
                                            if(isset($_POST['username'])){
                                                 if(!ctype_alnum($_POST['username'])){
                                                    $errormsg[]='the username can only contain letters ';
                                                }
                                                if(strlen($_POST['username'])>20){
                                                    $errormsg[]='your username have more than 20 character';
                                                }
                                            }
                                            if(isset($_POST['password'])){
                                                if($_POST['password']!=$_POST['password_cf']){
                                                    $errormsg[]='the password does not math ';
                                                }
                                            }
                                           

                                           if(!empty($errormsg)){
                                      
                                                foreach ($errormsg as $key => $value) {
                                                        echo "$value"; echo'</br>&nbsp;
                                                        ';     
                                                }
                                            }else{
                                                $sql = "INSERT INTO `employee` (`employee_id`, `employee_username`, `employee_password`, `employee_realname`, `date`,`question`) VALUES (NULL, '".$_POST['username']."', '".$_POST['password']."', '".$_POST['email']."', NOW(), '".$_POST['quest'].":".$_POST['answer']."' );";
                                               if($con->insert($sql)){
                                                echo 'Tạo tài khoản thành công </br> Bạn có thể đăng nhập ngay bây giờ ';
                                                echo'<a href="login.php">login</a>';
                                               }else {
                                                echo "regis fail";
                                               }
                                            }
                                       }

                                     ?></span>
                                </div>
                                <fieldset>
                                    <div class="form-group has-error">
                                        <input class="form-control input-lg" placeholder="Họ và Tên" name="email" autocomplete="off" type="text">
                                    </div>
                                     <div class="form-group has-error">
                                        <input class="form-control input-lg" placeholder="Tên TK" name="username" autocomplete="off" type="text">
                                    </div>
                                    <div class="form-group has-success">
                                        <input class="form-control input-lg" placeholder="Mật khẩu" name="password" value="" type="password">
                                    </div>
                                    <div class="form-group has-success">
                                        <input class="form-control input-lg" placeholder="Xác nhận mật khẩu" name="password_cf" value="" type="password">
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control input-lg" name="quest">
                                            <option selecterd="" value="color">Màu sắc yêu thích của bạn ?</option>
                                            <option selecterd="" value="pet">Con vật yêu thích của bạn ?</option>
                                            <option selecterd="" value="song">bài hát yêu thích của bạn ?</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control input-lg" placeholder="Trả lời câu hỏi trên" name="answer" value="" type="text">
                                    </div>
                                    <div class="checkbox">
                                        <label class="small">
                                            <input name="terms" class="" id="myCheck" onclick="checkAC();" type="checkbox"><span class="ml-1">Tôi đã đọc kỉ yêu cầu luật lệ của dịch vụ <a href="#">terms of service</a></span>
                                        </label>
                                    </div>
                                    <input class="btn  btn-lg btn-primary btn-block" on_click="error_notice();" id="regisbtn" name="regis" value="Đăng kí ngay" type="submit" disabled>
                                </fieldset>  
                                
                              </form>
                            </div>
                    </div>
                </div>
            </div>
      </div>

</body>
</html>


