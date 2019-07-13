<!-- Header -->
<head>
	<script type="text/javascript" src="js/daresay.js"></script>
</head>
<div id="header">
	<div class="shell">
		<!-- Logo + Top Nav -->
		<div id="top">
			<div id="top-dx">
				<img src="images/dx.png" height="48px" width="200px"/>
			</div>
			<div id="top-navigation">
				Welcome <a href="#"><strong><?php session_start();echo $_SESSION['username'];?></strong></a>
				<a href="#" onclick="return logout();">Log out</a>
			</div>
				<!--<span>|</span>
				<a href="#">Help</a>
				<span>|</span>
				<a href="#">Profile Settings</a>
				<span>|</span>-->
				
			
		</div>
<!-- End Logo + Top Nav -->

<!-- Main Nav -->
		<div id="navigation">
			<?php 
				if(!isset($_SESSION['role'])){
					header('Location: login.php');
				}else{
					if ($_SESSION['role'] == "admin") {
						include("menu_manage_admin.php");	
					} else if ($_SESSION['role'] == "sale"){
						include("menu_manage_sale.php");					
					} else {
						include("menu_manage.php");
					}
				}
			?>
		</div>
	<!-- End Main Nav -->
	</div>
</div>
<br/><br/>
