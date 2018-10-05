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
    <script type="text/javascript">

	     var videopath = "../teach_source/";
	     var swfplayer = videopath + "player/flowplayer-3.1.1.swf";

    </script>
    <script type="text/javascript">
        function makesure(){
	    if (confirm("Sure to delete？")) {
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
	include("header_manage.php");
?>
<!-- End Header -->

<!-- Container -->
<div id="container">
	<div class="shell">
		
		<!-- Small Nav -->
		<div class="small-nav">
			<a href="#">试听学生管理</a>
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
                      			<br/>
					<?php
					header("Content-type: text/html;charset=utf-8");
					require_once("phpmail/sendmail_interface.php");
					require_once("lib/db_opt.php");
					require_once("lib/lib.php");
						switch($_GET["action"]) {
							case "display_by_name":
								$name = $_GET["name"];
								$engname = $_GET["engname"];
								$age = $_GET["age"];
								$gender = $_GET["gender"];
								$phone = $_GET["phone"];
								$school = $_GET["school"];
								$demo_in = $_GET["demo_in"];
								$demo_date = $_GET["demo_date"];
								$state = $_GET["state"];
								$way = $_GET["way"];
								$saleman = $_GET["saleman"];
								$stuid = $_GET["stuid"];
								$join_into = $_GET["join_into"];
								$note = $_GET["note"];
								$from = $_GET["from"];
								$end = $_GET["end"];
								echo "<table border='0' width=500px  align='center'>";
									echo "<tr>";
										echo "<td align='center'>名字</td>";
										echo "<td>".$name."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>英文名字</td>";
										echo "<td>".$engname."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>年龄</td>";
										echo "<td>".$age."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>电话</td>";
										echo "<td>".$phone."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>所在学校</td>";
										echo "<td>".$school."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>试听班级</td>";
										echo "<td>".$demo_in."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>试听时间</td>";
										echo "<td>".$demo_date."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>信息来源</td>";
										echo "<td>".$way."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>课程顾问</td>";
										echo "<td>".$saleman."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>状态</td>";
										echo "<td>".$state."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>学员ID</td>";
										echo "<td>".$stuid."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>加入班级</td>";
										echo "<td>".$join_into."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>备注</td>";
										echo "<td>".$note."</td>";
									echo "</tr>";
								echo "</table>";
								echo "<br/><br/>";
								echo "<div style='text-align:center;'><a href='demo_student_manage.php?action=modify&name=".$name."&engname=".$engname."&age=".$age."&gender=".$gender."&phone=".$phone."&school=".$school."&demo_in=".$demo_in."&demo_date=".$demo_date."&state=".$state."&way=".$way."&saleman=".$saleman."&stuid=".$stuid."&join_into=".$join_into."&note=".$note."'><input class='submit' type='button' value='修改'/></a><a href='demo_student_manage.php?action=delete&name=".$name."&engname=".$engname."&from=".$from."&end=".$end."' onClick='return makesure()'><input class='submit' type='button' value='删除'/></a><a href='demo_student_manage.php?action=turn&name=".$name."&engname=".$engname."&age=".$age."&gender=".$gender."&phone=".$phone."&school=".$school."&demo_in=".$demo_in."&demo_date=".$demo_date."&state=".$state."&way=".$way."&saleman=".$saleman."&stuid=".$stuid."&join_into=".$join_into."&note=".$note."'><input class='submit' type='button' value='转正式'/></a><a href='demo_student_manage.php?action=display&from=".$from."&end=".$end."'><input class='submit' type='button' value='返回'/></a></div>";
								echo "<br/><br/>";
								break;
							case "display":
								if (isset($_REQUEST['from'])) {
									$datefrom = $_REQUEST['from'];
									$dateend = $_REQUEST['end'];
									$state = 'All';
								} else {

									$yearfrom=$_POST["yearfrom"];
									$monthfrom=$_POST["monthfrom"];
									$dayfrom=$_POST["dayfrom"];
									$yearend=$_POST["yearto"];
									$monthend=$_POST["monthto"];
									$dayend=$_POST["dayto"];
									$state=$_POST["state"];
									
									$datefrom=$yearfrom."-".$monthfrom."-".$dayfrom;
									$dateend=$yearend."-".$monthend."-".$dayend;
								}

								list($errno, $data) = demo_student_query_by_date($datefrom, $dateend, $state); 

								if (strcmp($state, '已报名') == 0) {
									echo "<table>";
									echo "<tr>";
									echo "<td>姓名</td>";
									echo "<td>试听时间</td>";
									echo "<td>试听班级</td>";
									echo "<td>课程顾问</td>";
									echo "<td>加入班级</td>";
									echo "<td>状态</td>";
									echo "<td>操作</td>";
									echo "</tr>";
									$i=0;
									for ($i; $i < count($data); $i++) {
										echo "<tr>";
											echo "<td>".$data[$i]['name']."(".$data[$i]['engname'].")</td>";
											echo "<td>".$data[$i]['demo_date']."</td>";
											echo "<td>".$data[$i]['demo_in']."</td>";
											echo "<td>".$data[$i]['saleman']."</td>";
											echo "<td>".$data[$i]['join_into']."</td>";
											echo "<td>".$data[$i]['state']."</td>";
											echo "<td><a href='demo_student_manage.php?action=display_by_name&name=".$data[$i]['name']."&engname=".$data[$i]['engname']."&age=".$data[$i]['age']."&gender=".$data[$i]['gender']."&phone=".$data[$i]['phone']."&school=".$data[$i]['school']."&demo_in=".$data[$i]['demo_in']."&demo_date=".$data[$i]['demo_date']."&state=".$data[$i]['state']."&way=".$data[$i]['way']."&saleman=".$data[$i]['saleman']."&stuid=".$data[$i]['stuid']."&join_into=".$data[$i]['join_into']."&note=".$data[$i]['note']."&from=".$datefrom."&end=".$dateend."'><input class='submit' type='button' value='操作'/></a></td>";
										echo "</tr>";
									}
									echo "</table>";
									echo "<br/><br/>";
								} else {
									echo "<table>";
									echo "<tr>";
									echo "<td>姓名</td>";
									echo "<td>电话</td>";
									echo "<td>试听时间</td>";
									echo "<td>状态</td>";
									echo "<td>备注</td>";
									echo "<td>操作</td>";
									echo "</tr>";
									$i=0;
									for ($i; $i < count($data); $i++) {
										echo "<tr>";
											echo "<td>".$data[$i]['name']."(".$data[$i]['engname'].")</td>";
											echo "<td>".$data[$i]['phone']."</td>";
											echo "<td>".$data[$i]['demo_date']."</td>";
											echo "<td>".$data[$i]['state']."</td>";
											echo "<td>".$data[$i]['note']."</td>";
											echo "<td><a href='demo_student_manage.php?action=display_by_name&name=".$data[$i]['name']."&engname=".$data[$i]['engname']."&age=".$data[$i]['age']."&gender=".$data[$i]['gender']."&phone=".$data[$i]['phone']."&school=".$data[$i]['school']."&demo_in=".$data[$i]['demo_in']."&demo_date=".$data[$i]['demo_date']."&state=".$data[$i]['state']."&way=".$data[$i]['way']."&saleman=".$data[$i]['saleman']."&stuid=".$data[$i]['stuid']."&join_into=".$data[$i]['join_into']."&note=".$data[$i]['note']."&from=".$datefrom."&end=".$dateend."'><input class='submit' type='button' value='操作'/></a></td>";
										echo "</tr>";
									}
									echo "</table>";
									echo "<br/><br/>";
								}

							break;
							case "add":
        							$chname = $_POST["ch_name"];
        							$engname = $_POST["eng_name"];
        							$age = $_POST["age"];
        							$gender = $_POST["gender"];
        							$school = $_POST["school"];
        							$phone = $_POST["phone"];
        							$demo_class = $_POST["demo_class"];
        							$demo_date = $_POST["demo_date"];
        							$way = $_POST["way"];
        							$state = $_POST["state"];
        							$sale = $_POST["sale"];
        							$note = $_POST["note"];

								list($errno, $row) = demo_student_add($chname, $engname, $age, $gender, $school, 
							 $phone, $demo_class, $demo_date, $way, $state, $sale, $note); 
							 	if ($errno)
									echo "<script>alert('添加试听学员失败-".$row."');window.history.go(-1);</script>";

								list($errno, $row) = demo_student_query_by_name($chname, $engname); 
								echo "<table border='0' width=500px  align='center'>";
									echo "<tr>";
										echo "<td align='center'>名字</td>";
										echo "<td>".$row['name']."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>英文名字</td>";
										echo "<td>".$row['engname']."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>年龄</td>";
										echo "<td>".$row['age']."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>电话</td>";
										echo "<td>".$row['phone']."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>所在学校</td>";
										echo "<td>".$row['school']."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>试听班级</td>";
										echo "<td>".$row['demo_in']."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>试听时间</td>";
										echo "<td>".$row['demo_date']."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>信息来源</td>";
										echo "<td>".$row['way']."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>课程顾问</td>";
										echo "<td>".$row['saleman']."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>状态</td>";
										echo "<td>".$row['state']."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>备注</td>";
										echo "<td>".$row['note']."</td>";
									echo "</tr>";
								echo "</table>";
								echo '<br/>';
								echo "Success!";
								break;
						
							case "delete":
								$name=$_GET["name"];
								$engname=$_GET["engname"];
								$from=$_GET["from"];
								$end=$_GET["end"];
								list($errno, $data) = demo_student_delete($name, $engname);
							 	if ($errno)
									echo "<script>alert('删除试听学员失败-".$data."');window.history.go(-1);</script>";
								echo "<script>alert('删除试听学员成功!');window.location.href='demo_student_manage.php?action=display&from=".$from."&end=".$end."';</script>";
							break;
							case "modify":
								$name = $_GET["name"];
								$engname = $_GET["engname"];
								$age = $_GET["age"];
								$gender = $_GET["gender"];
								$phone = $_GET["phone"];
								$school = $_GET["school"];
								$demo_in = $_GET["demo_in"];
								$demo_date = $_GET["demo_date"];
								$state = $_GET["state"];
								$way = $_GET["way"];
								$saleman = $_GET["saleman"];
								$stuid = $_GET["stuid"];
								$join_into = $_GET["join_into"];
								$note = $_GET["note"];
								echo "<form action='demo_student_manage.php?action=modify_do' method='post'>
									<table border='0' width=500px  align='center'>";
									echo "<tr>";
										echo "<td align='center'>名字</td>";
										echo "<td><input name='name' id='name' value='".$name."'></td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>英文名</td>";
										echo "<td><input name='engname' id='engname' value='".$engname."'></td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>年龄</td>";
										echo "<td><input name='age' id='age' value='".$age."'></td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>性别</td>";
										echo "<td><input name='gender' id='gender' value='".$gender."'></td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>电话</td>";
										echo "<td><input name='phone' id='phone' value='".$phone."'></td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>所在学校</td>";
										echo "<td><input name='school' id='school' value='".$school."'></td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>试听班级</td>";
										echo "<td><input name='demo_in' id='demo_in' value='".$demo_in."'></td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>试听时间</td>";
										echo "<td><input name='demo_date' id='demo_date' value='".$demo_date."'></td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>信息来源</td>";
										echo "<td><input name='way' id='way' value='".$way."'></td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>课程顾问</td>";
										echo "<td><input name='saleman' id='saleman' value='".$saleman."'></td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>状态</td>";
										echo "<td><input name='state' id='state' value='".$state."'></td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>学员ID</td>";
										echo "<td><input name='stuid' id='stuid' value='".$stuid."'></td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>加入班级</td>";
										echo "<td><input name='join_into' id='join_into' value='".$join_into."'></td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>备注</td>";
										echo "<td><input name='note' id='note' value='".$note."'></td>";
									echo "</tr>";
									echo "<tr>
											<td>
											<input type='hidden' name='name_hide' value='$name' />
											</td>
											<td>
											<input type='hidden' name='engname_hide' value='$engname' />
											</td>
											</tr>";
								echo "</table>";
								echo "<div style='text-align:center;'><td align='right'><input class='field'  style='background-color:#F9EBAE' type='submit' name='add' value='修改'/></div>";
								echo "</form>";
								echo "<br/><br/>";

							break;
							case "turn":
								$name = $_GET["name"];
								$engname = $_GET["engname"];
								$age = $_GET["age"];
								$gender = $_GET["gender"];
								$phone = $_GET["phone"];
								$school = $_GET["school"];
								$demo_in = $_GET["demo_in"];
								$demo_date = $_GET["demo_date"];
								$state = $_GET["state"];
								$way = $_GET["way"];
								$saleman = $_GET["saleman"];
								$stuid = $_GET["stuid"];
								$join_into = $_GET["join_into"];
								$note = $_GET["note"];

								echo "<form action='demo_student_manage.php?action=turn_do' method='post'>
								       <table border='0' align='center' width='800'>
									<tr>
									<td align='center' >姓名:</td>
									<td><input class='field' type='text' name='name' value='$name'/></td>
									</tr>
									<tr>
									<td align='center' >英文名:</td>
									<td><input class='field' type='text' name='engname' value='$engname'/></td>
									</tr>
									<tr>
									<td align='center' >年龄:</td>
									<td><input class='field' type='text' name='age' value='$age'/></td>
									</tr>
									<tr>
									<td align='center' >性别:</td>
									<td><input class='field' type='text' name='sex' value='$gender'/></td>
									</tr>

									<tr>
									<td align='center' >电话:</td>
									<td><input class='field' type='text' name='phone' value='$phone'/></td>
									</tr>
									<tr>
									<td align='center' >所在学校:</td>
									<td><input class='field' type='text' name='school' value='$school'/></td>
									</tr>

									<tr>
									<td align='center' >班级</td>
									<td><select name='classid'><option value='def'>请选择</option>";
								
										require_once("lib/lib.php");
										$classes = get_running_class();
										echo $classes;
										for ($i=0;$i<count($classes);$i++) {
								            $tmp = $classes[$i];
											echo "<option value='$tmp'>".$tmp."</option>";	
										}	
								
									$today = date("Y-n-j");
									echo "</select></td>
										</tr>
										<tr>
										<td align='center' >缴费日期:</td>
										<td><input type='text' name='pay_time' value='".$today."'/></td>
										</tr>
										<tr>
										<td align='center' >缴费金额:</td>
										<td><input type='text' name='charge'/></td>
										</tr>
										<tr>
										<td align='center' >缴费课时:</td>
										 <td><select name='hour_begin'>";
											$fir_tmp=0;
											$i=0;
											for ($i;$i<97;$i++) {
												if ($fir_tmp == $hour_begin)
													echo "<option value='{$fir_tmp}' 
														selected='selected'>{$fir_tmp}</option>";
												else 
													echo "<option value='{$fir_tmp}'>{$fir_tmp}</option>";
													
												$fir_tmp=$fir_tmp+2;
											}
										echo "</select>";
										echo "至";
										echo "<select name='hour_end'>";	
										$fir_tmp=0;
											$i=0;
											for ($i;$i<97;$i++) {
												if ($fir_tmp == $hour_end)
													echo "<option value='{$fir_tmp}' 
														selected='selected'>{$fir_tmp}</option>";
												else 
													echo "<option value='{$fir_tmp}'>{$fir_tmp}</option>";
													
												$fir_tmp=$fir_tmp+2;
											}
											
										echo "</select>
										
										</td>
										</tr>
										<tr>
										<td align='center' >备注:</td>
										<td><input type='text' name='note' value='$note'/></td>
										</tr>
										<tr>
										<td align='center' >积分:</td>
										<td><input type='text' name='credit'/></td>
										</tr>
										<tr>
											<td align='center' >修改Online</td>
											<td><select class='field' name='online'>
												<option value='1'>是</option>;
												<option value='0'>否</option>;
												</select>
											</td>
										</tr>
										<tr>
										<td align='right'><input type='submit' name='add' value='添加正式学员'/></td>
										</tr>";
									echo "<tr>
											<td>
											<input type='hidden' name='name_hide' value='$name' />
											</td>
											<td>
											<input type='hidden' name='engname_hide' value='$engname' />
											</td>
											</tr>";


									echo "</table></form>";

							break;
							case "turn_do":
								$name=$_POST["name"];
								$engname=$_POST["engname"];
								$age=$_POST["age"];
								$sex=$_POST["sex"];
								$phone=$_POST["phone"];
								$school=$_POST["school"];
								$classid=$_POST["classid"];
								$charge=$_POST["charge"];
								$hour_begin=$_POST["hour_begin"];
								$hour_end=$_POST["hour_end"];
								$note=$_POST["note"];
								$pay_time=$_POST["pay_time"];
								$credit=$_POST["credit"];
								$oldname=$_POST["name_hide"];
								$oldengname=$_POST["engname_hide"];


								list($errno, $data) = student_add($name, $engname, $age, $sex, $school, $phone, $classid, $charge, $hour_begin, $hour_end, $pay_time, $credit, $note);
							 	if ($errno)
									echo "<script>alert('添加正式学员失败-".$data."');window.history.go(-1);</script>";
								list($errno, $data) = demo_student_turn_real($oldname, $oldengname, $name, $engname, 0, $classid);
							 	if ($errno)
									echo "<script>alert('修改试听学员为正式学员失败-".$data."');window.history.go(-1);</script>";
								
								$where = "888";
                                				send_mail("18020023616@163.com", "New Student From ".$where, $name."-".$age."岁-".$school."-".$phone);
								list($errno, $row) = demo_student_query_by_name($name, $engname); 
							 	if ($errno)
									echo "<script>alert('查询试听学员失败-".$row."');window.history.go(-1);</script>";
								echo "<table border='0' width=500px  align='center'>";
									echo "<tr>";
										echo "<td align='center'>名字</td>";
										echo "<td>".$row['name']."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>英文名</td>";
										echo "<td>".$row['engname']."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>年龄</td>";
										echo "<td>".$row['age']."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>电话</td>";
										echo "<td>".$row['phone']."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>所在学校</td>";
										echo "<td>".$row['school']."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>试听班级</td>";
										echo "<td>".$row['demo_in']."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>试听时间</td>";
										echo "<td>".$row['demo_date']."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>信息来源</td>";
										echo "<td>".$row['way']."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>课程顾问</td>";
										echo "<td>".$row['saleman']."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>状态</td>";
										echo "<td>".$row['state']."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>学员ID</td>";
										echo "<td>".$row['stuid']."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>加入班级</td>";
										echo "<td>".$row['join_into']."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>备注</td>";
										echo "<td>".$row['note']."</td>";
									echo "</tr>";
								echo "</table>";
								echo '<br/>';
								echo "Success!";
							break;
							case "modify_do":
								$name = $_POST["name"];
								$engname = $_POST["engname"];
								$age = $_POST["age"];
								$gender = $_POST["gender"];
								$phone = $_POST["phone"];
								$school = $_POST["school"];
								$demo_in = $_POST["demo_in"];
								$demo_date = $_POST["demo_date"];
								$state = $_POST["state"];
								$way = $_POST["way"];
								$saleman = $_POST["saleman"];
								$stuid = $_POST["stuid"];
								$join_into = $_POST["join_into"];
								$note = $_POST["note"];
								$oldengname=$_POST["engname_hide"];
								$oldname=$_POST["name_hide"];

								list($errno, $row) = demo_student_modify ($oldname, $oldengname, $name, $engname, $age, $gender, $school, $phone, $demo_in, $demo_date, $way, $state, $saleman, $stuid, $join_into, $note); 
							 	if ($errno)
									echo "<script>alert('修改试听学员失败-".$row."');window.history.go(-1);</script>";

								list($errno, $row) = demo_student_query_by_name($name, $engname); 
								echo "<table border='0' width=500px  align='center'>";
									echo "<tr>";
										echo "<td align='center'>名字</td>";
										echo "<td>".$row['name']."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>英文名</td>";
										echo "<td>".$row['engname']."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>年龄</td>";
										echo "<td>".$row['age']."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>电话</td>";
										echo "<td>".$row['phone']."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>所在学校</td>";
										echo "<td>".$row['school']."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>试听班级</td>";
										echo "<td>".$row['demo_in']."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>试听时间</td>";
										echo "<td>".$row['demo_date']."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>信息来源</td>";
										echo "<td>".$row['way']."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>课程顾问</td>";
										echo "<td>".$row['saleman']."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>状态</td>";
										echo "<td>".$row['state']."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>学员ID</td>";
										echo "<td>".$row['stuid']."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>加入班级</td>";
										echo "<td>".$row['join_into']."</td>";
									echo "</tr>";
									echo "<tr>";
										echo "<td>备注</td>";
										echo "<td>".$row['note']."</td>";
									echo "</tr>";
								echo "</table>";
								echo '<br/>';
								echo "Success!";
								break;
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
					<?php
						include "demo_student_right.php";	
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
	include("bottom.php");
?>
<!-- End Footer -->
	
</body>
</html>
