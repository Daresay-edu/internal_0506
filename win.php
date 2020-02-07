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
									  $report_type=$_REQUEST["report_type"];
									  
									  echo $date; 
									  if ($type == '0')
										  echo '&nbsp培训机构';
									  if ($type == '1')
										  echo '&nbsp中小学';
									  if ($type == '2')
										  echo '&nbsp托幼机构';
									  if ($report_type == '1')
										  echo '&nbsp教职工';
									  if ($report_type == '0')
										  echo '&nbsp零报告';
									  if ($report_type == '2')
										  echo '&nbsp学生';
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
					$training = array(0 => "25.新理念",  1=>"1.智贝优学", 2=>"2.创彩", 3=>"3.佩心艺术", 4=>"4.蓝山未来", 
					               5=>"5.点燃", 6=>"6.爱尚奈斯", 7=>"7.青果立方", 8=>"8.玖远明德", 9=>"9.星派", 10=>"10.乐谷艺术",
								   11=>"11.哆乐", 12=>"12.武海跆拳道", 13=>"13.魔力石", 14=>"14.艺晟", 15=>"15.简学",
								   16=>"16.恒燊", 17=>"17.思大", 18=>"18.光影", 19=>"19.米粒儿", 20=>"20.千汇",
								   21=>"21.学乐英语", 22=>"22.创优壹佰", 23=>"23.文荟艺晟", 24=>"24.裕晟鑫", 25=>"26.必爱艺术",
								   26=>"27.神墨素质", 27=>"28.博知雅", 28=>"29.达希", 29=>"30.赋格", 30=>"31.酷玩",
								   31=>"32.艺杉", 32=>"33.彩艺画时", 33=>"34.小禾", 34=>"35.言美天下", 35=>"36.伊睿", 
								   36=>"37.津艺", 37=>"38.爱垦", 38=>"39.万卉英语", 39=>"40.红师教育", 40=>"41.芝麻街",
								   41=>"42.津陇联合", 42=>"43.佳阳", 43=>"44.学优益思", 44=>"45.德昱", 45=>"46.彩象傲尊",
								   46=>"47.海柏思", 47=>"48.爱儿星", 48=>"49.乐知", 49=>"50.蓓美", 50=>"51.金艺绘艺术",
								   51=>"52.优文教育", 52=>"53.坦途培训", 53=>"54.闻殊艺术", 54=>"55.优倍佳", 55=>"56.博佳机器人",
								   56=>"57.学而思", 57=>"58.艺朵", 58=>"59.优咪", 59=>"60.优而格", 60=>"61.彩悦未来",
								   61=>"62.星奕慧", 62=>"63.童彩艺术", 63=>"64.尚悦跆拳道", 64=>"65.真棒", 65=>"66.棒棒贝贝",
								   66=>"67.零晨美术", 67=>"68.米奇绘", 68=>"69.九拍音乐", 69=>"70.博尚思");
								   
					$school = array(0 => "1.中北中学",  1=>"2.中北小学", 2=>"3.中北第二小学", 3=>"4.星光路小学", 4=>"5.为明实验小学");
					
					$kindergarten = array(0 => "1-1.中北镇中心幼儿园",  1=>"1-2.中北镇第二幼儿园", 2=>"2-1.侯台为明幼儿园", 3=>"2-2.小金星幼儿园", 4=>"2-3.华亭幼儿园", 
					               5=>"2-4.水语花城幼儿园",6=>"2-5.为明幼儿园",7=>"2-6.依丽幼儿园",8=>"2-7.启蒙顺通幼儿园",9=>"2-8.京师育成幼儿园",
								   10=>"2-9.禾嘉幼儿园",11=>"2-10.凯斯云锦幼儿园",12=>"2-11.为明澜湾幼儿园",13=>"2-12.京师幼学幼儿园",14=>"2-13.蕰莎幼儿园",
								   15=>"2-14.普纳荷幼儿园",16=>"2-15.和美婴童幼儿园",17=>"2-16.英博幼儿园",18=>"2-17.佳佑幼儿园",19=>"3-1.星艺托幼点",
								   20=>"3-2.童真宝贝托幼点",21=>"3-3.伊睿国际托幼点",22=>"3-4.贝乐多托幼点",23=>"3-5.好未来托幼点",24=>"3-6.华夏智晟托幼点",
								   25=>"3-7.神龙天意托幼点",26=>"3-8.希乐儿童中心托幼点",27=>"3-9.宝康乐托幼点",28=>"3-10.新大托幼点",29=>"3-11.小星星托幼点",
								   30=>"3-12.晨光托幼点",31=>"3-13.奕天皓托幼点",32=>"3-14.七彩阳光托幼点",33=>"3-15.向日葵托幼点",34=>"3-16.启航托幼点",
								   35=>"3-17.天启托幼点",36=>"3-18.金娃娃托幼点",37=>"3-19.明日之星托幼点",38=>"3-20.鑫鑫托幼点",39=>"3-21.天之骄托幼点",
								   40=>"3-22.欣蕾托幼点",41=>"3-23.小太阳托幼点",42=>"3-24.圣德美托幼点",43=>"3-25.宝圣托幼点",44=>"3-26.童星托幼点",
								   45=>"3-27.爱博托幼点",46=>"3-28.德恩托幼点",47=>"3-29.博轩丽洁托幼点",48=>"3-30.晨旭托幼点",49=>"3-31.爱博阳光托幼点",
								   50=>"3-32.每名佳托幼点",51=>"3-33.华德福托幼点",52=>"3-34.美睿托幼点",53=>"3-35.新明星托幼点",54=>"3-36.育蕾托幼点",
								   55=>"3-37.宝贝家托幼点",56=>"3-38.汉思托幼点",57=>"3-39.怡童托幼点",58=>"3-40.童乐艺智托幼点",59=>"3-41.育硕托幼点",
								   60=>"3-42.天使托幼点",61=>"3-43.启智托幼点",62=>"3-44.启发托幼点",63=>"3-45.童苑托幼点",64=>"3-46.育馨托幼点",
								   65=>"3-47.童馨托幼点",66=>"3-48.瑞缘托幼点",67=>"3-49.育红托幼点",68=>"3-50.鑫童心托幼点",69=>"3-51.金色童年托幼点",
								   70=>"3-52.小天使托幼点",71=>"3-53.明玥托幼点");						
				                if ($date == '0') {
									echo "<table>";
									echo "<tr><td>请在右侧选择要查询的日期！</td></tr>";
									echo "</table>";
									echo "</br></br>";
								} else if($report_type == 0 ){
                                	echo "<table>";
                                	echo "<tr>";
                                	echo "<td>ID</td>";
									echo "<td>镇号</td>";
                                	echo "<td>机构</td>";
                                	echo "<td>报告人数</td>";
                                	echo "<td>日期</td>";
                                	//$date=date("Y-m-d");
                                	echo "</tr>";
									list($errno, $data) = win_query_by_date(strtotime($date), $type); 
									
                                	$i=0;
									$j=1;
										if ($type == '0') {
											$train = $training;
										}
										if ($type == '1') {
											$train = $school;
										}
										if ($type == '2') {
											$train = $kindergarten;
										}
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
								echo "<th>未上报机构名单</th>";
								
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
                            }  else if($report_type == 2 ){
                                	echo "<table>";
                                	echo "<tr>";
                                	echo "<td>ID</td>";
									echo "<td>镇号</td>";
                                	echo "<td>机构</td>";
                                	echo "<td>NO3</td>";
                                	echo "<td>NO4</td>";
									echo "<td>NO5</td>";
									echo "<td>NO6</td>";
									echo "<td>NO7</td>";
                                	echo "<td>NO8</td>";
									echo "<td>NO9</td>";
									echo "<td>NO10</td>";
									echo "<td>NO11</td>";
                                	echo "<td>NO12</td>";
									echo "<td>NO13</td>";
									echo "<td>NO14</td>";
									echo "<td>NO15</td>";
									echo "<td>上报日期</td>";
                                	//$date=date("Y-m-d");
                                	echo "</tr>";
									list($errno, $data) = win_stu_query_by_date(strtotime($date), $type); 
									
                                	$i=0;
									$j=1;
										if ($type == '0') {
											$train = $training;
										}
										if ($type == '1') {
											$train = $school;
										}
										if ($type == '2') {
											$train = $kindergarten;
										}
									$stu_3_to = 0;
									$stu_4_to = 0;
									$stu_5_to = 0;
									$stu_6_to = 0;
									$stu_7_to = 0;
									$stu_8_to = 0;
									$stu_10_to = 0;
									$stu_11_to = 0;
									$stu_12_to = 0;
									$stu_13_to = 0;
									$stu_15_to = 0;
									for ($i; $i < count($data); $i++) {
											echo "<td>".$j++."</td>";
											echo "<td>".$data[$i]['stu_1']."</td>";
											echo "<td>".$data[$i]['stu_2']."</td>";
											echo "<td>".$data[$i]['stu_3']."</td>";
											echo "<td>".$data[$i]['stu_4']."</td>";
											echo "<td>".$data[$i]['stu_5']."</td>";
											echo "<td>".$data[$i]['stu_6']."</td>";
											echo "<td>".$data[$i]['stu_7']."</td>";
											echo "<td>".$data[$i]['stu_8']."</td>";
											echo "<td>".$data[$i]['stu_9']."</td>";
											echo "<td>".$data[$i]['stu_10']."</td>";
											echo "<td>".$data[$i]['stu_11']."</td>";
											echo "<td>".$data[$i]['stu_12']."</td>";
											echo "<td>".$data[$i]['stu_13']."</td>";
											echo "<td>".$data[$i]['stu_14']."</td>";
											echo "<td>".$data[$i]['stu_15']."</td>";
											echo "<td>".$data[$i]['date']."</td>";
											$stu_3_to = $stu_3_to + (int)$data[$i]['stu_3'];		
											$stu_4_to = $stu_4_to + (int)$data[$i]['stu_4'];
											$stu_5_to = $stu_5_to + (int)$data[$i]['stu_5'];
											$stu_6_to = $stu_6_to + (int)$data[$i]['stu_6'];		
											$stu_7_to = $stu_7_to + (int)$data[$i]['stu_7'];
											$stu_8_to = $stu_8_to + (int)$data[$i]['stu_8'];
											$stu_10_to = $stu_10_to + (int)$data[$i]['stu_10'];		
											$stu_11_to = $stu_11_to + (int)$data[$i]['stu_11'];
											$stu_12_to = $stu_12_to + (int)$data[$i]['stu_12'];
											$stu_13_to = $stu_13_to + (int)$data[$i]['stu_13'];		
											$stu_15_to = $stu_15_to + (int)$data[$i]['stu_15'];	
										
											
										echo "</tr>";
									
										foreach($train as $key=>$value) {
											if (strcmp($data[$i]['stu_2'], $value) == 0) {
											//if ($se == $tw) {
												unset($train[$key]);
											}
										}
									}
							    echo "</table>";
								echo "<br/><br/>";
								echo "<table>";
								echo "<th>已上报机构各项值求和</th>";
								echo "<tr><td>";
								echo "<br/>学生总数求和：".$stu_3_to;
								echo "<br/><br/>外省市户籍学生人数求和：".$stu_4_to;
								echo "<br/><br/>外省市户籍学生离开本市回老家学生人数求和：".$stu_5_to;
								echo "<br/><br/>截止今日外省市户籍学生从老家返津学生人数求和：".$stu_6_to;
								echo "<br/><br/>从湖北省地区返津学生人数（本地生+外地生）求和：".$stu_7_to;
								echo "<br/><br/>截止今日新增从湖北省地区返津学生人数求和：".$stu_8_to;
								echo "<br/><br/>滞留湖北省地区学生人数（本地生+外地生）求和：".$stu_10_to;
								echo "<br/><br/>除湖北省以外地区返津学生人数（本地生+外地生）求和：".$stu_11_to;
								echo "<br/><br/>滞留除湖北省以外地区学生人数（本地生+外地生）求和：".$stu_12_to;
								echo "<br/><br/>今日发热学生人数求和：".$stu_13_to;
								echo "<br/><br/>截止今日新增除湖北省以外地区返津学生人数求和：".$stu_15_to;
								echo "</tr></td>";
								echo "<table>";
                                echo "<br/><br/>";
							
								echo "<th>未上报机构名单</th>";
								
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
                            
							  
                            } if($report_type == 1 ){

                                	echo "<table>";
                                	echo "<tr>";
                                	echo "<td>ID</td>";
									echo "<td>镇号</td>";
                                	echo "<td>机构</td>";
                                	echo "<td>NO3</td>";
                                	echo "<td>NO4</td>";
									echo "<td>NO5</td>";
									echo "<td>NO6</td>";
									echo "<td>NO7</td>";
                                	echo "<td>NO8</td>";
									echo "<td>NO9</td>";
									echo "<td>NO10</td>";
									echo "<td>NO11</td>";
									echo "<td>NO12</td>";
									echo "<td>上报日期</td>";
                                	//$date=date("Y-m-d");
                                	echo "</tr>";
									list($errno, $data) = win_teacher_query_by_date(strtotime($date), $type); 
									
                                	$i=0;
									$j=1;
										if ($type == '0') {
											$train = $training;
										}
										if ($type == '1') {
											$train = $school;
										}
										if ($type == '2') {
											$train = $kindergarten;
										}
									$stu_3_to = 0;
									$stu_4_to = 0;
									$stu_5_to = 0;
									
									$stu_7_to = 0;
									$stu_8_to = 0;
									$stu_9_to = 0;
									$stu_10_to = 0;
									$stu_12_to = 0;
									for ($i; $i < count($data); $i++) {
											echo "<td>".$j++."</td>";
											echo "<td>".$data[$i]['tea_1']."</td>";
											echo "<td>".$data[$i]['tea_2']."</td>";
											echo "<td>".$data[$i]['tea_3']."</td>";
											echo "<td>".$data[$i]['tea_4']."</td>";
											echo "<td>".$data[$i]['tea_5']."</td>";
											echo "<td>".$data[$i]['tea_6']."</td>";
											echo "<td>".$data[$i]['tea_7']."</td>";
											echo "<td>".$data[$i]['tea_8']."</td>";
											echo "<td>".$data[$i]['tea_9']."</td>";
											echo "<td>".$data[$i]['tea_10']."</td>";
											echo "<td>".$data[$i]['tea_11']."</td>";
											echo "<td>".$data[$i]['tea_12']."</td>";
											echo "<td>".$data[$i]['date']."</td>";
											$stu_3_to = $stu_3_to + (int)$data[$i]['tea_3'];		
											$stu_4_to = $stu_4_to + (int)$data[$i]['tea_4'];
											$stu_5_to = $stu_5_to + (int)$data[$i]['tea_5'];
											$stu_7_to = $stu_7_to + (int)$data[$i]['tea_7'];		
											$stu_8_to = $stu_8_to + (int)$data[$i]['tea_8'];
											$stu_9_to = $stu_9_to + (int)$data[$i]['tea_9'];
											$stu_10_to = $stu_10_to + (int)$data[$i]['tea_10'];		
											$stu_12_to = $stu_12_to + (int)$data[$i]['tea_12'];	
	
																				
										echo "</tr>";
									
										foreach($train as $key=>$value) {
											if (strcmp($data[$i]['tea_2'], $value) == 0) {
											//if ($se == $tw) {
												unset($train[$key]);
											}
										}
									}
							    echo "</table>";
								echo "<br/><br/>";
								echo "<table>";
								echo "<th>已上报机构各项值求和</th>";
								echo "<tr><td>";
								echo "<br/>教职员工总数求和：".$stu_3_to;
								echo "<br/><br/>从湖北省地区返津教职员工人数求和：".$stu_4_to;
								echo "<br/><br/>截止今日新增从湖北省地区返津教职员工人数求和：".$stu_5_to;
								echo "<br/><br/>滞留湖北省地区教职员工人数求和：".$stu_7_to;
								echo "<br/><br/>除湖北省以外地区返津教职员工人数求和：".$stu_8_to;
								echo "<br/><br/>滞留除湖北省以外地区教职员工人数求和：".$stu_9_to;
								echo "<br/><br/>今日发热教职员工人数求和：".$stu_10_to;
								echo "<br/><br/>截止今日新增除湖北省以外地区返津教职员工人数求和：".$stu_12_to;

								echo "</tr></td>";
								echo "<table>";
                                echo "<br/><br/>";
								echo "<table>";
								echo "<th>未上报机构名单</th>";
								
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
						include "win_right.php";	
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
