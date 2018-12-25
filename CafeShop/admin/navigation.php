<div class="container-fluid">
	<nav class="navbar navbar-inverse">
		<!-- navbar -->
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-4">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">MaMaCa</a>
			</div>
			<!-- collapse -->
			<div class="collapse navbar-collapse" id="navbar-collapse-4">
				<ul class="nav navbar-nav navbar-right slide-down">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">ql bán hàng</a>
						<ul class="dropdown-menu text-light-bg-dark" id="nav_child">
							<li><a href="#" id="tk_bill">thống kê bill</a></li>
							<li><a href="#" id="tk_thuchi">thống kê thu chi</a></li>
							<li><a href="#">thống kê theo món</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">quản lý hàng</a>
						<ul class="dropdown-menu text-light-bg-dark" id="nav_child">
							<li><a href="#" id="menu" data-toggle="modal" data-target="#modal1">nhóm menu thực đơn</a></li>
							<li><a href="#" id="menudetail" data-toggle="modal" data-target="#modal2">menu thực đơn</a></li>
							<li><a href="#" id="groupresource" data-toggle="modal" data-target="#modal1">nhóm nguyên liệu</a></li>
							<li><a href="#" id="addresource" data-toggle="modal" data-target="#modal4">thêm nguyên liệu</a></li>
							<li><a href="#" id="importresource" data-toggle="modal" data-target="#modal5">nhập kho nguyên liệu</a></li>
							<li><a href="#" id="listimportresource" data-toggle="modal" data-target="#modal6">danh sách nhập kho</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">phiếu in</a>
						<ul class="dropdown-menu text-light-bg-dark">
							<li><a href="#" id="phieuthu" data-toggle="modal" data-target="#modal78">phiếu thu</a></li>
							<li><a href="#" id="phieuchi" data-toggle="modal" data-target="#modal78">phiếu chi</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">cài đặt</a>
						<ul class="dropdown-menu text-light-bg-dark">
							<li><a href="infocoffee.php" data-toggle="modal" data-target="#modal-info">thông tin quán cafe của bạn</a></li>
							<li><a href="#">chương trình khuyến mãi</a></li>
							<!-- <li><a href="#">cài đặt máy in</a></li> -->
						</ul>
					</li>

					<li>
						<a class="btn btn-default btn-outline btn-circle collapsed" data-toggle="collapse" href="#nav-collapse" aria-expanded="false" aria-controls="nav-collapse"><?php 
								if(isset($_SESSION['realname'])){
									echo '<span id="employ">'.$_SESSION['realname'].'</span>' ;
								}else {
									echo '<span id="login">Đăng nhập</span>' ;
								}


						 ?> <i class=""></i> </a>
					</li>
				</ul>
				<ul class="collapse nav navbar-nav nav-collapse slide-down " role="profile" id="nav-collapse" >
					<li><a href="#" style="color: transparent;">Support</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="" width="20" /><?= $_SESSION['username'] ?><span class="caret"></span></a>
						<ul class="dropdown-menu text-light-bg-dark">
							<li><a href="#">My profile</a></li>
							<li><a href="#">Permission</a></li>
							<li><a href="#">Settings</a></li>	
							<li class="divider"></li>
							<li><a href="Account/signout.php">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</div>