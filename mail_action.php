<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>DareSay Education</title>
	<link rel="stylesheet" href="css/jquery.fancybox.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
    <script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="js/flowplayer-3.1.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.fancybox-1.2.1.pack.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="js/fancyplayer.js"></script>
	<script type="text/javascript" src="js/daresay.js"></script>
    <script type="text/javascript">

	     var videopath = "../teach_source/";
	     var swfplayer = videopath + "player/flowplayer-3.1.1.swf";
function makesure(){
    if (confirm("确认此操作么？")) {
        return true; 
    }
    return false;
}

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
	text-align:left;
}
td
{
height: 30px;
}
.content{text-indent:2em;letter-spacing:8px;line-height:30px;font-family:"Arial";}
</style>
</head>
<body>
<!-- Header -->
<?php
	include("header_manage.php");
?>
<!-- End Header -->

<!-- Container -->
<div id="container">
	<div class="shell">
		
		<!-- Small Nav -->
		<div class="small-nav">
			<a href="#">备课</a>
		</div>
		<!-- End Small Nav -->
		
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
						<h2 class="left"></h2>
                    			</div>
					<!-- End Box Head -->	

					<!-- Table -->
					<div class="vidoes">
                      			<!-- Add Videos -->
                      		
					<?php
					require_once("database_opt/db_opt.php");
					require_once("database_opt/public.php");
					switch($_GET["action"]) {
						case "see":
							$classid = $_POST["classid"];
							$class_num = $_POST["begin_class"];
							$note = $_POST["note"];
                            
							if (strcmp($classid, 'def')==0 || strcmp($class_num, 'null') == 0) {
								echo "<script>alert('请指定班级和课时！');window.history.go(-1);</script>";
								exit;
							}
							
							$conn=db_conn("daresay_db");
							$table_name="class";
							$sql="SELECT * FROM {$table_name} WHERE classid='$classid'";
							$result=mysql_query($sql,$conn);
							if (!$result)
									die("SQL: {$sql}<br>Error:".mysql_error());	
							$row = mysql_fetch_assoc($result);
							
							$mail=$row['mail_address'];
							$class_source=$row['source1'];
							$public_source=$row['source2'];
							
							$mailcontent = "<div class='content'>";

							/* get content */

							$cb = substr($classid,0,2);
							$filename = $cb."_class_content.txt";
							$filename = "class_content/".$filename;
							$myfile = fopen("$filename", "r") or die("Unable to open file!");
							//echo fread($myfile,filesize("$filename"));
							$find_begin=0;
							while(!feof($myfile)) {
								$read_line = fgets($myfile);
								if ($class_num == "1-192") {
									$mailcontent .=  $read_line;
								} else {
									if ($find_begin == 0 && strncmp("$read_line", "$class_num", strlen("$class_num"))==0) {
										$find_begin = 1;

									}
									if ($find_begin == 1) {
										if (strstr($read_line,"@@@")) {
											break;
										}
										$mailcontent .=  $read_line."<br>";
									}
								}

							}
							$mailcontent .= "</div>";
							fclose($myfile);
							
							//echo "<form action='phpmail/sendmail.php?action=send' method='post'>";
							echo "<form action='mail_action.php?action=record' method='post'>";
							echo "<table>";
						            echo "<tr>";
								echo "<td width='20%'>上课班级: </td><td width='80%'>".$classid."</td>";
							    echo "</tr>";
						            
						            echo "<tr>";
								echo "<td>课时: </td><td>".$class_num."</td>";
							    echo "</tr>";
						            echo "<tr>";
								echo "<td>课程内容如下: </td><td>".$mailcontent."</td>";
							    echo "</tr>";
							//echo iconv('GB2312', 'UTF-8', $mailcontent);
							echo "<br/><br/>";
							echo "<input type='hidden' name='classid' value='$classid'/>";
							echo "<input type='hidden' name='begin_class' value='$class_num'/>";
							echo "<input type='hidden' name='class_source' value='$class_source'/>";
							echo "<input type='hidden' name='public_source' value='$public_source'/>";
							echo "<input type='hidden' name='mail_address' value='$mail'/>";
							echo "<input type='hidden' name='note' value='$note'/>";
							echo "</table>";

							$current_hour = get_current_hour ($classid);
							list($fir_hour, $sec_hour) = explode("-", $current_hour);
		                                        list($tmp_fir,$tmp_sec) = explode("-",$class_num);
                                                        echo "<br/></br><div style='text-align:center; vertical-align:middel;'>";
						        if ((int)$tmp_fir - (int)$sec_hour != 1){
							    echo "<input class='submit' type='submit' name='send' value='请按顺序记录课程内容' disabled='disabled' onClick='return makesure()'/>&nbsp;&nbsp;";
							}else{
							    echo "<input class='submit' type='submit' name='send' value='记录课程内容' onClick='return makesure()'/>&nbsp;&nbsp;";
							}
							echo "<a href='mail_index.php'><input class='submit' type='button' value='返回'></a></div>";
							echo "</form>";
							//show audio of this class
							$audio_dir="class_content/".$cb." audio/$class_num";
							echo "<br/>";
							
							if (is_dir($audio_dir)) {
									$filesnames = scandir($audio_dir);
									if ($filesnames != false) {
										//print_r($filesnames);
										foreach ($filesnames as $filename) {
											if ($filename != "." && $filename != "..") { 
												$filename=$audio_dir."/".$filename;
												echo "&nbsp";
												echo "<audio controls='controls' playcount='10'>";
												echo "<source src='$filename' />"; 
												echo "</audio>";
											}
										}
									}
								}
							
							
							echo "<br/><br/>";
							break;
						case "record":
		                                        $classid = $_POST["classid"];
		                                        $class_num = $_POST["begin_class"];
		                                        $class_source = $_POST["class_source"];
		                                        $public_source = $_POST["public_source"];
		                                        $smtpemailto = $_POST["mail_address"];
		                                        $note = $_POST["note"];
		                                        
		                                        //将上课信息加入到class_info_record数据库中
		                                        require_once("database_opt/db_opt.php");
		                                        require_once("database_opt/public.php");
		                                        $conn=db_conn("daresay_db");
		                                        $table_name="class_info_record";
		                                        $sql="SELECT * FROM {$table_name}";
		                                        $result=mysql_query($sql,$conn);
		                                        $result=mysql_num_rows($result);
		                                        if($result<1){
		                                        	//表不存在，创建k2001_class_info_record类似的表
		                                        	$sql="CREATE TABLE {$table_name} (id INT(20) not null AUTO_INCREMENT,classid varchar(100),date varchar(100),week varchar(100),hour varchar(100),class_info varchar(1000),absent varchar(64),note varchar(1000),primary key(id))";
		                                        	$result=mysql_query($sql, $conn);
		                                        	if (!$result) {
		                                        		die("SQL: {$sql}<br>Error:".mysql_error());
		                                        		//goto SndMail;
		                                        	}
		                                        }
		                                        //将上课信息加入到class_info_record数据库中
		                                        include("class_content/hour_classinfo_match.php");
		                                        $cb=substr($classid,0,2);
		                                        $class_content=$cb."_class_content";
		                                        list($tmp_fir,$tmp_sec) = explode("-",$class_num);
							$current_hour = get_current_hour ($classid);
							//要记录的课时需要比系统中记录的课时大一课时
							list($fir_hour, $sec_hour) = explode("-", $current_hour);
		                                        list($tmp_fir,$tmp_sec) = explode("-",$class_num);
						        if ((int)$tmp_fir - (int)$sec_hour != 1){
						            echo "<script>alert('操作失败！预发送的课时为".$class_num."需要比已记录课时".$current_hour."大1！');window.history.go(-1);</script>";
							    break;
							}	
		                                        foreach(${$class_content} as $K=>$V) {
		                                        	list($tmp_a,$tmp_b) = explode("-",$K);
		                                        	if ($tmp_a <= $tmp_fir && $tmp_sec <= $tmp_b) {
		                                        		if (strncmp($V,"Math",4) == 0 || strncmp($V,"Science",7)==0) {
		                                        			$print_lesson=$V;
		                                        				break;
		                                        		}

		                                        		$l_num=($tmp_fir-$tmp_a)/2+1;
		                                        		$print_lesson=$V." Lesson ".$l_num;
		                                        		break;
		                                        	} 
		                                        }

		                                        $weekarray=array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
		                                        $date=date("Y-m-d");
		                                        $week=$weekarray[date("w")];
		                                        $class_info=$print_lesson;
		                                        $absent="";
		                                        //$note="";
		                                        mysql_query('BEGIN',$conn);
		                                        $sql="SELECT * FROM {$table_name} FOR UPDATE";
		                                        $result=mysql_query($sql,$conn);
		                                        if (!$result)
		                                        	die("SQL: {$sql}<br>Error:".mysql_error());
		                                        $sql="INSERT INTO {$table_name} (classid, date, week, hour, class_info, absent, note) VALUES ('$classid', '$date', '$week', '$class_num', '$class_info', '$absent', '$note')";
		                                        $result=mysql_query($sql, $conn);
		                                        echo mysql_error();
		                                        if (!$result) {
		                                        		die("SQL: {$sql}<br>Error:".mysql_error());
		                                        		//goto SndMail;
		                                        }
		                                        mysql_query('COMMIT',$conn);
		                                        mysql_close($conn);
							require_once("database_opt/public.php");
							print_class_record_info($classid);
		                                        
//SndMail:
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
						<h2>Management</h2>
					</div>
					<!-- End Box Head-->
					
					<div class="box-content">
						<a href="#" class="add-button"><span>Add new Article</span></a>
						<div class="cl">&nbsp;</div>
						
						<p class="select-all"><input type="checkbox" class="checkbox" /><label>select all</label></p>
						<p><a href="#">Delete Selected</a></p>
						
						<!-- Sort -->
						<div class="sort">
							<label>Sort by</label>
							<select class="field">
								<option value="">Title</option>
							</select>
							<select class="field">
								<option value="">Date</option>
							</select>
							<select class="field">
								<option value="">Author</option>
							</select>
						</div>
						<!-- End Sort -->
						
					</div>
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
	include("bottom.php");
?>
<!-- End Footer -->
	
</body>
</html>
