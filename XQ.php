<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>中北镇机构疫情报告统计</title>
	<link rel="stylesheet" href="css/jquery.fancybox.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
    <script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="js/flowplayer-3.1.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.fancybox-1.2.1.pack.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="js/fancyplayer.js"></script>
    <script type="text/javascript">

	     var videopath = "../teach_source/";
	     var swfplayer = videopath + "player/flowplayer-3.1.1.swf";

    </script>
    <style type="text/css">

    table
{
width: 720px;
margin: 0 auto;
	border-collapse:collapse;
	font-size: 15px;
}
table, tr, td
{
border: 1px solid;
	text-align:center;
}
td
{
height: 30px;
}
</style>
</head>
<body>
<!-- Header -->
<?php
	//include("header_manage.php");
?>
<!-- End Header -->

<!-- Container -->
<div id="container">
	<div class="shell">
		<!-- Message OK -->		
		
		<!-- End Message Error -->
		<br />
		<!-- Main -->
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<!-- Content -->
			<div id="content">
				
				<!-- Box -->
				<div class="box">
				<!-- Box Head -->
				<div class="box-head">
				<h2 class="left"><?php 
				                      $date=$_REQUEST["date"]; 
									  $type=$_REQUEST["type"];  
									  //$report_type=$_REQUEST["report_type"];
									  
									  echo $date; 
									 
									  ?> 
				报告</h2>
				</div>
				<!-- End Box Head -->	

				<!-- Table -->
				<div class="vidoes">
				<!-- Add Videos -->
				<br/>
				<table border="0" width="700">
				<?php
				header("Content-type: text/html;charset=utf-8");
				 require_once("lib/db_opt.php");
				 require_once("lib/lib.php");
					
					$kindergarten = array(0=> "1.杨柳青阳光宝贝", 1=>"2.杨柳青为明", 2=>"3.杨柳青智开星", 3=>"4.杨柳青斯阔谷", 4=>"5.中北为明", 5=>"6.中北水语花城",
					                      6=> "7.中北华亭", 7=>"8.中北侯台为明", 8=>"9.中北京师幼学", 9=>"10.中北小金星", 10=>"11.中北凯斯云锦",
										  11=>"12.中北京师育成", 12=>"13.中北温莎", 13=>"14.中北普纳荷", 14=>"15.中北为明澜湾", 15=>"16.中北启蒙顺通",
										  16=>"17.中北依丽", 17=>"18.中北佳佑", 18=>"19.中北英博", 19=>"20.中北禾嘉", 20=>"21.中北和美和慧",
										  21=>"22.辛口超凡", 22=>"23.辛口小金星", 23=>"24.张窝乐嘟嘟", 24=>"25.张窝希望之星", 25=>"26.张窝恩卓",
										  26=>"27.柯莱姆四季花城", 27=>"28.张窝如鱼起航", 28=>"29.华夏未来智慧山", 29=>"30.精武爱尚", 30=>"31.精武师大实验园",
										  31=>"32.精武喜洋洋", 32=>"33.精武未来", 33=>"34.精武和乐明雅", 34=>"35.西营门盛和嘉园", 35=>"36.大寺斯阔谷",
										  36=>"37.大寺金贝实验", 37=>"38.华夏之光龙津", 38=>"39.大寺和美洛卡", 39=>"40.王稳庄北区", 40=>"41.王稳庄金色阳光",
										  41=>"42.李七庄华兰国际", 42=>"43.李七庄蝌安谛", 43=>"44.李七庄创才", 44=>"45.李七庄华夏之星", 45=>"46.李七庄阳光宝贝",
										  46=>"47.李七庄宏文蒙世", 47=>"48.李七庄铭泽", 48=>"49.华夏未来梅江湾", 49=>"50.李七庄蒙瑞", 50=>"51.李七庄华夏明天", 
										  51=>"52.李七庄美林高瞻", 52=>"53.李七庄中慧未来", 53=>"54.李七庄榕泽");						
				                if ($date == '0') {
									echo "<table>";
									echo "<tr><td>请在右侧选择要查询的日期！</td></tr>";
									echo "</table>";
									echo "</br></br>";
								} else {
                                	echo "<table>";
                                	echo "<tr>";
                                	echo "<td>ID</td>";
									echo "<td>序号</td>";
                                	echo "<td>园所</td>";
                                	echo "<td>疫情情况</td>";
                                	echo "<td>日期</td>";
                                	//$date=date("Y-m-d");
                                	echo "</tr>";
									list($errno, $data) = win_query_by_date(strtotime($date), $type); 
									
                                	$i=0;
									$j=1;
										
											$train = $kindergarten;
									
									for ($i; $i < count($data); $i++) {
										if ($data[$i]['number'] == 0) {
											echo "<tr>";
										} else {
											echo "<tr bgcolor='#EE6363'>"; 
										}
											echo "<td>".$j++."</td>";
											echo "<td>".$data[$i]['phone']."</td>";
											echo "<td>".$data[$i]['school']."</td>";
											echo "<td>".$data[$i]['number']."</td>";
											echo "<td>".$data[$i]['date']."</td>";
																				
										echo "</tr>";
									
										foreach($train as $key=>$value) {
											if (strcmp($data[$i]['school'], $value) == 0) {
											//if ($se == $tw) {
												unset($train[$key]);
											}
										}
									}
							    echo "</table>";
                                echo "<br/><br/>";
								echo "<table>";
								echo "<th>未上报园所名单</th>";
								
								$i=0;
								foreach($train as $key=>$value) {
									if ($i++%5 == 0) {
										echo "<tr>";
										echo "<td>";
									}
									
									echo $value;
									echo "&nbsp;";
									if ($i%5 == 0) {
										echo "</td>";
										echo "</tr>";
									}
										
								}
								
								echo "</table>";
								 echo "<br/><br/>";
                            
							//echo "<a href='win_download.php'><input class='submit' type='button' value='Modify'></a>";  
                          
                            }
                                
                                ?>
                    		
					</div>
					<!-- Table -->
					
				</div>
				<!-- End Box -->
				
			</div>
			<!-- End Content -->
			
			<!-- Sidebar -->
			<div id="sidebar">
				
				<!-- Box -->
				<div class="box">
					
					<!-- Box Head -->
					<div class="box-head">
						<h2>报告</h2>
					</div>
					<!-- End Box Head-->
					<?php
						include "XQ_right.php";	
					?>

					
				</div>
				<!-- End Box -->
			</div>
			<!-- End Sidebar -->
			
			<div class="cl">&nbsp;</div>			
		</div>
		<!-- Main -->
	</div>
</div>
<!-- End Container -->

<!-- Footer -->
<?php
	//include("bottom.php");
?>
<!-- End Footer -->
	
</body>
</html>
