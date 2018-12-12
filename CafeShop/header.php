<?php session_start();

$path = substr( $_SERVER["PHP_SELF"], 10 , -4);
$_SESSION['url']=$path;


 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HOUSECOFFE</title>

        <!-- Bootstrap core CSS -->

        <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="fonts/stylesheet.css" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link rel="icon" href="images/favicon.png">

        <!-- Custom styles for this template -->

        <link href="css/style.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
        <!-- <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>  -->
        <script src="js/jquery.min.js" type="text/javascript"></script>

        <script src="js/bootstrap.min.js" type="text/javascript"></script>
         <script type="text/javascript" src="js/instafeed.min.js"></script>
        <script src="js/custom.js" type="text/javascript"></script>
<script type="text/javascript" src="js/shopingcart.js"></script>
    <script type="text/javascript">
       
    </script>
    </head>
    <body>
        <!-- overlay-* -->
        <div id="overlay-body" onclick="off();"></div>
        <div id="overlay-body2" onclick="off2();"></div>

        <!--header--->
        <header>
            <div class="top-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 text-left col-sm-6 col-xs-6 width-100 txt-center">
                            <div class="social-icons">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </div>
                        </div>
                        <div class="col-md-6 text-right col-sm-6 col-xs-6 width-100 txt-center">
                            <div class="address-location">
                                <a href="#"><i class="fa fa-map-marker fa-lg"></i> LÊ DUẪN -ĐÀ NẴNG</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="middle-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 text-left col-sm-4 col-xs-4 width-100 txt-center">
                            <div class="opening">
                                <p>Giờ mở cửa 8:00 am - 11:00 pm</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-3 text-center width-40 txt-right">
                            <div class="logo">
                                <a href="home.html"><img src="images/Home/logo.png"></a>
                            </div>
                        </div>
                        <?php 
                           


                         ?>
                        <div class="col-md-4 text-right col-sm-3 col-xs-4 mt_20">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <a class="search" id="searchtoggl"><i class="fa fa-search"></i></a>
                                <div id="searchbar" class="clearfix">
                                    <form type="post" action="shoping.php" onsubmit="return search();">
                                        <button type="submit" id="searchsubmit" class="fa fa-search fa-lg"></button>
                                        <input type="search" name="search-icon" class="placeholder-fix" id="search-icon" placeholder="Tìm thức ăn ..." autocomplete="off">
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="search">
                                    <button type="button" class="btn btn-default" onclick="window.location.href='/cafeshop/payment.php'"><i class="fa fa-shopping-cart"></i></button>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                                 <table  class="search_result " >
                                            
                                           <tbody id="result_div">
                                                
                                              
 
                                           </tbody>
                                       </table>
            </div>
            <div class="bottom-header">
                <nav class="navbar navbar-default">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse pl-0" id="myNavbar">
                            <ul class="nav navbar-nav navbar-center">
                                  <li class=
                                "<?php if($path=="index"){
                                    echo'active';
                                } ?>"><a href="index.php">home</a></li>
                                <li class="<?php if($path=="intro"){
                                    echo'active';
                                } ?>"><a href="intro.php">Giới thiệu</a></li>
                                <li class="<?php if($path=="menu"){
                                    echo'active';
                                } ?>"><a href="menu.php">menu</a></li>
                                <li class="<?php if($path=="event"){
                                    echo'active';
                                } ?>"><a href="event.php">Sự kiên</a></li>
                                <li class="<?php if($path=="news"){
                                    echo'active';
                                } ?>"><a href="news.php">Tin tức</a></li>
                                <li class="<?php if($path=="contact"){
                                    echo'active';
                                } ?>"><a href="contact.php">Liên Hệ</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
