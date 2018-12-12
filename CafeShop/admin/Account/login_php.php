<?php 
include("config2.php");
$con = new Connect("admincafe");

    // if(isset($_COOKIE['remembername'])){
    //     $username = $con->decryptCookie($_COOKIE['remembername']);
    //     $userpass = $con->decryptCookie($_COOKIE['rememberpass']);
    //      $sql ="SELECT count(*) as countuser  FROM `users` WHERE employee_username = '".$username."' AND employee_password ='".$userpass."'  ";
    //        //$row = array();
    //         $row= $con->select($sql);
    //         if($row!=0){
    //             if($row[0]['countuser'] > 0){
    //                  $_SESSION['userpass']=$userpass;
    //                  $_SESSION['username']=$username;
    //                  header("location:categories.php");
    //             }
    //         }
    // }
    //submit 
    if(isset($_POST['signin'])){
        $uname = mysqli_real_escape_string($con->conn,$_POST['user_name']);
        $password = mysqli_real_escape_string($con->conn,$_POST['pass_word']);

        if($uname!= "" and $password!=""){
            $sql ="SELECT count(*) as countuser,employee_username,employee_password,employee_realname  FROM `employee` WHERE employee_username = '".$uname."' AND employee_password ='".$password."'  ";
            $row= $con->select($sql);
            if($row!=0){
              if($row[0]['countuser']>0){
                    $employee_password=$row[0]['employee_password'];
                    $employee_username=$row[0]['employee_username'];
                    $employee_realname=$row[0]['employee_realname'];

                    if(isset($_POST['remember-me'])){
                        $uname = $con->encryptCookie($employee_username);
                        $upass = $con->encryptCookie($employee_password);
                        setcookie("remembername",$uname,time() + (86400 * 30),'/');
                        setcookie("rememberpass",$upass,time() + (86400 * 30),'/');
                    }

                    $_SESSION['userpass']=$employee_password;
                    $_SESSION['username']=$employee_username;
                    $_SESSION['realname']=$employee_realname;
                     echo'  <div class="row justify-content-center"><div class="col-md-4 text-center alert alert-danger">
                                    <a class="close font-weight-light" data-dismiss="alert" href="#">×</a>login succes!!!
                       </div>
                     </div>';
                    header("Location:../Admin.php");
                    exit;
              }else{
                echo'  <div class="row justify-content-center"><div class="col-md-4 text-center alert alert-danger">
                            <a class="close font-weight-light" data-dismiss="alert" href="#">×</a>Tài khoản or mật khẩu chưa đúng 
                       </div>
                     </div>';
       }
            }


        }    
    }

 ?>