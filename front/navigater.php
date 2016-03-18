<!--Start Header-->
<div id="screensaver">
	<canvas id="canvas"></canvas>
	<i class="fa fa-lock" id="screen_unlock"></i>
</div>
<div id="modalbox">
	<div class="devoops-modal">
		<div class="devoops-modal-header">
			<div class="modal-header-name">
				<span>Basic table</span>
			</div>
			<div class="box-icons">
				<a class="close-link">
					<i class="fa fa-times"></i>
				</a>
			</div>
		</div>
		<div class="devoops-modal-inner">
		</div>
		<div class="devoops-modal-bottom">
		</div>
	</div>
</div>
<header class="navbar">
	<div class="container-fluid expanded-panel">
		<div class="row">
			<div id="logo" class="col-xs-12 col-sm-2">
				<a href="#ajax/search.php">Inventory V2</a>
			</div>
			<div id="top-panel" class="col-xs-12 col-sm-10">
				
			</div>
		</div>
	</div>
</header>
<!--End Header-->
<!--Start Container-->
<div id="main" class="container-fluid">
	<div class="row">
		<div id="sidebar-left" class="col-xs-2 col-sm-2">
			<ul class="nav main-menu">
				<li>
					<a href="ajax/search.php" class="ajax-link">
						<i class="fa fa-search"></i>
						<span class="hidden-xs">Search</span>
					</a>
				</li>
				
				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-list-alt"></i>
						 <span class="">Inventory</span>
					</a>
					<ul class="dropdown-menu">
                                                <li><a class="ajax-link" href="ajax/list_data.php">Inventory</a></li>
                                                <li><a class="ajax-link" href="ajax/add_inventory.php">Add Inventory</a></li>
						
					</ul>
				</li>
				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-inbox"></i>
						 <span class="">Category</span>
					</a>
					<ul class="dropdown-menu">
                                            <li><a class="ajax-link" href="#ajax/category.php">Category</a></li>
                                              <li><a class="ajax-link" href="#ajax/add_category.php">Add category</a></li>
						
						
					</ul>
				</li>
				
				
				
				
				
			</ul>
		</div>
		<!--Start Content-->
		<div id="content" class="col-xs-12 col-sm-10">
			<div id="about">
				<div class="about-inner">
					<h4 class="page-header">Open-source admin theme for you</h4>
					<p>DevOOPS team</p>
					<p>Homepage - <a href="http://devoops.me" target="_blank">http://devoops.me</a></p>
					<p>Email - <a href="mailto:devoopsme@gmail.com">devoopsme@gmail.com</a></p>
					<p>Twitter - <a href="http://twitter.com/devoopsme" target="_blank">http://twitter.com/devoopsme</a></p>
					<p>Donate - BTC 123Ci1ZFK5V7gyLsyVU36yPNWSB5TDqKn3</p>
				</div>
			</div>
			<div class="preloader">
				<img src="img/devoops_getdata.gif" class="devoops-getdata" alt="preloader"/>
			</div>
			<div id="ajax-content"></div>
		</div>
		<!--End Content-->
	</div>
</div>