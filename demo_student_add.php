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
	<script>
function CheckForm()
{
		var name=document.getElementById("ch_name").value;
		var engname=document.getElementById("eng_name").value;
		var demo_date=document.getElementById("demo_date").value;
		var school=document.getElementById("school").value;
		var way=document.getElementById("way").value;
		var sale=document.getElementById("sale").value;
		if (name.length == 0 || 
		    engname.length == 0 || 
			demo_date.length == 0 ||
			way.length == 0 ||
			sale.length == 0 ||
			school.length == 0) {
			alert("请输入中文名、英文名、年龄、学校、试听时间、信息来源、课程顾问，若没有英文名请输入中文名全拼！");
			return false;
		}
        var phone=document.getElementById("phone").value;
		if (phone.length != 11) {
			alert("为了方便同家长联系，请输入11位电话号码！");
			return false;
		}
		var classid=document.getElementById("classid").value;
		if (classid == "def") {
			alert("请选择班级！");
			return false;
		}
}

</script>
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
						<h2 class="left">试听登记</h2>
                    			</div>
					<!-- End Box Head -->	

					<!-- Table -->
					<div class="vidoes">
                      			<!-- Add Videos -->
                      			<br/>
					<form action="demo_student_manage.php?action=add" method="post" onsubmit="return CheckForm()">
					   <table border="0" align="center" width="800">
					   	<tr>
							<td align="center" >姓名:</td>
							<td><input class='field' type="text" name="ch_name" id="ch_name"/></td>
						</tr>
					   	<tr>
							<td align="center" >英文名:</td>
							<td><input class='field' type="text" name="eng_name" id="eng_name"/></td>
						</tr>
					   	<tr>
							<td align="center" >年龄:</td>
							<td><select class='field' name="age" id="age">
							    <?php
									$i=0;
									$year=2;
									for ($i;$i<19;$i++) {
									echo "<option value='{$year}'>{$year}</option>";
									$year++;
								}
								?>
							   </select>
							</td>
						</tr>
					   	<tr>
							<td align="center" >性别:</td>
							<td><select class='field' name="gender">
							    <option value="男">男</option>;
							    <option value="女">女</option>;
							   </select>
							</td>
						</tr>
					   	<tr>
							<td align="center" >电话:</td>
							<td><input class='field' type="text" name="phone" id="phone"/></td>
						</tr>
					   	<tr>
							<td align="center" >所在学校:</td>
							<td><input class='field' type="text" name="school" id="school"/></td>
						</tr>
					 
						<tr>
							<td align="center" >试听日期:</td>
							<?php
								$today=date("Y-n-j");
							?>
							<td><input class='field' type="text" name="demo_date" id="demo_date" value="<?php echo $today;?>"/></td>
						</tr>
					   	<tr>
							<td align="center" >主教:</td>
							<td><select class='field' name='chief_teacher' id="chief_teacher">
								<option value="def">请选择</option>
								<?php
									require_once("lib/lib.php");
									list($errno, $data) = get_all_teachers();
									if ($errno)
										echo "<script>alert('获取教师信息失败-".$row."');</script>";
									$i=0;
									for ($i; $i < count($data); $i++) {
										echo "<option value='".$data[$i]['engname']."'>".$data[$i]['engname']."</option>";
									}
								?>
								</select>
							</td>
						</tr>
					   	<tr>
							<td align="center" >助教:</td>
							<td><select class='field' name='assis_teacher' id="assis_teacher">
								<option value="def">请选择</option>
								<?php
									require_once("lib/lib.php");
									list($errno, $data) = get_all_teachers();
									if ($errno)
										echo "<script>alert('获取教师信息失败-".$row."');</script>";
									$i=0;
									for ($i; $i < count($data); $i++) {
										echo "<option value='".$data[$i]['engname']."'>".$data[$i]['engname']."</option>";
									}
								?>
								</select>
							</td>
						</tr>

					   	<tr>
							<td align="center" >信息来源:</td>
							<td><select class='field' name='way'/>;
								<option value='上门'>上门</option>
								<option value='广告'>广告</option>
								<option value='推荐'>推荐</option>
							</select>
							</td>
						</tr>
					   	<tr>
							<td align="center" >状态:</td>
							<td><select class='field' name='state'/>;
								<option value='未试听'>未试听</option>
								<option value='已试听'>已试听</option>
								<option value='已报名'>已报名</option>
							</select>
							</td>

						</tr>
							<tr>
							<td align="center" >接待人员:</td>
							<td><select class='field' name='reception' id="reception">
								<option value="def">请选择</option>
								<?php
									require_once("lib/lib.php");
									list($errno, $data) = get_all_teachers();
									if ($errno)
										echo "<script>alert('获取教师信息失败-".$row."');</script>";
									$i=0;
									for ($i; $i < count($data); $i++) {
										if ($data[$i]['engname'] == $_SESSION['username']) {
											echo "<option value='".$data[$i]['engname']."' selected='selected'>".$data[$i]['engname']."</option>";
										} else {
											echo "<option value='".$data[$i]['engname']."'>".$data[$i]['engname']."</option>";
										}
									}
								?>
								</select>
							</td>
						</tr>
					   	<tr>
							<td align="center" >课程顾问:</td>
							<td><select class='field' name='sale' id="sale">
								<option value="def">请选择</option>
								<?php
									require_once("lib/lib.php");
									list($errno, $data) = get_all_teachers();
									if ($errno)
										echo "<script>alert('获取教师信息失败-".$row."');</script>";
									$i=0;
									for ($i; $i < count($data); $i++) {
										if ($data[$i]['engname'] == $_SESSION['username']) {
											echo "<option value='".$data[$i]['engname']."' selected='selected'>".$data[$i]['engname']."</option>";
										} else {
											echo "<option value='".$data[$i]['engname']."'>".$data[$i]['engname']."</option>";
										}
									}
								?>
								</select>
							</td>
						</tr>
					   	<tr>
							<td align="center" >备注:</td>
							<td><input class='field' type="text" name="note"/></td>
						</tr>
						<tr>
							<td align="right"><input class='field'  style="background-color:#F9EBAE" type="submit" name="add" value="添加"/></td>
						</tr>
						</table>
					   </form>
                     
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
						<h2>试听学员管理</h2>
					</div>
					<!-- End Box Head-->
					<?php include("demo_student_right.php");?>
					
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
