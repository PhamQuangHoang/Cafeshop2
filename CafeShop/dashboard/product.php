<?php 
include("../config.php");
$con = new Connect('cafepage');


 ?>


<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--><!--  <html class="no-js" lang=""> --> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ela Admin - HTML5 Admin Template</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
  
    
    <link rel="stylesheet" href="assets/css/style.css">
    
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
   <script type="text/javascript">
                    function update(id) {

                      var prID= id;
                      var prName=document.getElementById(id+"_prdname").value;
                      var prType=document.getElementById(id+"_prdtype").value;
                      var prPrice=document.getElementById(id+"_prdprice").value;
                      var prImg=document.getElementById(id+"_prdimage").value;
                    

                      $.ajax({
                        type:'post',
                          url:'dashboardaction.php',
                        data:{
                               update:'true',
                               prID:prID,
                               prName:prName,
                               prType:prType,
                               prPrice:prPrice,
                               prImg:prImg
                        },
                        success:function(response) {
                          alert(response);         
                        }
                      });
   }

                 function deleteData(id) {
                        var s = "";
                      $.ajax({
                        type:'post',
                          url:'dashboardaction.php',
                        data:{
                               delete:'true',
                               prID:id
                               
                        },
                        success:function(response) {
                            alert("Xoa thanh cong");
                           $(response).remove();

                        }
                      });

              }
      
    var prodName;
    var prodType;
    var prodPrice;
    var prodImage;
    function onload() { 
        prodName = document.getElementById('prodName');
        prodType = document.getElementById('prodType');
        prodPrice = document.getElementById('prodPrice');
        prodImage = document.getElementById('prodImage');
    }
    function kk(){
        prodName = prodName.value;
        prodType = prodType.value;
        prodPrice = prodPrice.value;
        prodImage = prodImage.value;
                     $.ajax({
                        type:'post',
                          url:'dashboardaction.php',
                        data:{
                               newcart:'true',
                               prodName:prodName,
                               prodType:prodType,
                               prodPrice:prodPrice,
                               prodImage:prodImage
                               
                        },
                        success:function(response) {
                            alert(response);
                             location.reload();
                                

                        }
                      });

    }

                
   

   



                // function trclick(id){
                //       var prID= id;
                //       var prName=document.getElementById(id+"_prdname").value;
                //       var prType=document.getElementById(id+"_prdtype").value;
                //       var prPrice=document.getElementById(id+"_prdprice").value;
                //       var prImg=document.getElementById(id+"_prdimage").value;
                    
                //         $.ajax({
                //             type:'post',
                //               url: "dashboard_action.php",
                //             data:{
                //                // update:'true',
                //                // prID:prID,
                //                // prName:prName,
                //                // prType:prType,
                //                // prPrice:prPrice,
                //                // prImg:prImg
                               
                //             },
                //             success:function(response) {
                //               alert(response);
                //             }
                //           });
                     

    
                // }


            </script>
 
</head>
<body onload="onload();">
	 

                                      
    <!-- Left Panel -->

     <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.html"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">UI elements</li><!-- /.menu-title -->
                  
                    <li class="menu-item-has-children active dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Quản lý </a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="product.php">Product</a></li>
                            <li><i class="fa fa-table"></i><a href="customer1.php">Khách hàng mới</a></li>
                            <li><i class="fa fa-table"></i><a href="customer2.php">Khách hàng đã giao dịch</a></li>
                        </ul>
                    </li> 
                    <li class="menu-item-has-children active dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Quản lý web</a>
                        <ul class="sub-menu children dropdown-menu">
                           
                            <li><i class="fa fa-table"></i><a href="dashboardevent.php">Tạo sự kiện</a></li>
                        </ul>
                    </li>
                   

                   
                    <li class="menu-title">Extras</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Pages</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="page-login.html">Login</a></li>
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="page-register.html">Register</a></li>
                            <li><i class="menu-icon fa fa-paper-plane"></i><a href="pages-forget.html">Forget Pass</a></li>
                            <li><i class="menu-icon fa fa-paper-plane"></i><a href="index.php">Landing page</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="../images/logo.png" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="../images/logo2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger">3</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">You have 3 Notification</p>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-check"></i>
                                    <p>Server #1 overloaded.</p>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-info"></i>
                                    <p>Server #2 overloaded.</p>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-warning"></i>
                                    <p>Server #3 overloaded.</p>
                                </a>
                            </div>
                        </div>

                        <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-envelope"></i>
                                <span class="count bg-primary">4</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="message">
                                <p class="red">You have 4 Mails</p>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="../images/avatar/1.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Jonathan Smith</span>
                                        <span class="time float-right">Just now</span>
                                        <p>Hello, this is an example msg</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="../images/avatar/2.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Jack Sanders</span>
                                        <span class="time float-right">5 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="images/avatar/3.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Cheryl Wheeler</span>
                                        <span class="time float-right">10 minutes ago</span>
                                        <p>Hello, this is an example msg</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="../images/avatar/4.jpg"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Rachel Santos</span>
                                        <span class="time float-right">15 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="../images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-user"></i>My Profile</a>

                            <a class="nav-link" href="#"><i class="fa fa-bell-o"></i>Notifications <span class="count">13</span></a>

                            <a class="nav-link" href="#"><i class="fa fa-cog"></i>Settings</a>

                            <a class="nav-link" href="#"><i class="fa fa-power-off"></i>Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Table</a></li>
                                    <li class="active">Data table</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
             
         
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="panel-body table-responsive" >
                                <table  class="table  table-sm table-bordered " id="mytable">


                                    <thead>
                                        <tr>
                                            <th >ID</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Loại sản phẩm</th>
                                            <th>Giá sản phẩm</th>
                                            <th>hình</th>
                                        </tr>
                                    </thead>
                                    <tbody>                                       
                                    	           <tr>
				                                        	<td><input type="text" class="text-control" name=""   value="" disabled="true"></td>
				                                        	<td><input type="text" class="text-control" name="prodName" id="prodName"  value="" ></td>
				                                        	<td><input type="text" class="text-control" name="prodType"  id="prodType" value=""></td>
				                                        	<td><input type="text" class="text-control" name="prodPrice" id="prodPrice" value=""></td>
				                                        	
				                                        	<td><input type="text"  class="text-control" name="prodImage" id="prodImage" value="" ></td>
				                                        	
				                                        	<td onclick="kk();"><button type="button" id="add"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></td>	
				                                        
				                                        </tr>

                                                    
                                    	<?php 

                                        $sql = "SELECT count(*) as count FROM `listproduct` WHERE 1";
                                        $row = $con->select($sql);
                                        $total_records = $row[0]['count'];
                                        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                                        $limit = 10;
                                        $total_page = ceil($total_records/$limit);

                                         if ($current_page > $total_page){
                                                    $current_page = $total_page;
                                                }
                                                else if ($current_page < 1){
                                                    $current_page = 1;
                                                }
                                        $start =($current_page - 1) * 10;
                                    	$sql = "SELECT * FROM `listproduct` LIMIT $start, $limit";
                                    	$row = $con->select($sql);
							           if($row!=0){
							                for($i = 0 ;$i<sizeof($row);$i++){
				                                     echo' <tr id="tr_id'.$row[$i]['productID'].'">
				                                        	<td ><span id="prID">'.$row[$i]['productID'].'</span></td>
				                                        	<td><input type="text" class="text-control" name="" id="'.$row[$i]['productID'].'_prdname" value="'.$row[$i]['productName'].'"></td>
				                                        	<td><input type="text" class="text-control" name=""  id="'.$row[$i]['productID'].'_prdtype" value="'.$row[$i]['productType'].'"></td>
				                                        	
				                                        	<td><input type="text"  class="text-control" name="" id="'.$row[$i]['productID'].'_prdprice" value="'.$row[$i]['productPrice'].'" ></td>
				                                        	<td><input type="text" class="text-control" name="" id="'.$row[$i]['productID'].'_prdimage" value="'.$row[$i]['productImage'].'"></td>
				                                        	<td onclick="update('.$row[$i]['productID'].');"><button type="submit"><i class="fa fa-pencil" aria-hidden="true"></i> </button></td>
				                                        	<td onclick="deleteData('.$row[$i]['productID'].');"><button type="submit" ><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
				                                        
				                                        </tr>' ; 
				                                    }

							           	}

 											?>	
                                        
                                    </tbody>
                                </table>
                                <nav aria-label="navigation pagination-sm">
                                      <ul class="pagination justify-content-end">
                                        <?php  if ($current_page > 1 && $total_page> 1){
                                     echo '<li class="page-item">
                                          <a class="page-link" href="product.php?page='.($current_page-1).'" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                          </a>
                                        </li>';
                                    }
                                        for ($i = 1; $i <= $total_page; $i++){
                                              if ($i == $current_page){
                                                    echo '<li class="page-item active"><a class="page-link " href="product.php?page='.$i.'">'.$i.'</a></li> ';
                                                }
                                                else{
                                                    echo '<li class="page-item"><a class="page-link" href="product.php?page='.$i.'">'.$i.'</a></li>

                                                    ';
                                                }
                                            }


                                    if ($current_page < $total_page && $total_page > 1){
                echo '                   <li class="page-item">
                                          <a class="page-link" href="product.php?page='.($current_page+1).'" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                          </a>
                                        </li>';
                                         }
             ?>
                                        
                                        
                                      </ul>
                                    </nav>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


        <div class="clearfix"></div>

        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2018 Ela Admin
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                </div>
            </div>
        </footer>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Scripts -->
   
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>
   
    
    <script src="../js/jquery.min.js" type="text/javascript"></script>

        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- <script src="js/custom.js" type="text/javascript"></script> -->


   


   

</body>
</html>
