<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>DareSay Education</title>
<link rel="stylesheet" href="css/jquery.fancybox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/datedropper.css">
<script type="text/javascript" src="js/daresay.js"></script>
</head>
<body>

<div class='box-content'>
<a href='teacher_salary_record.php' class='add-button'><span>新增打卡记录</span></a>
<div class='cl'>&nbsp;</div>

<form action="teacher_salary_manage.php?action=display" method="post">
<div class='sort'>

<label>英文名</label>
<?php 
							        $role = 'ordinary';									
									if (isset($_SESSION['role'])){
                                        if ($_SESSION['role'] == 'admin') {
										    $role = 'admin';
										} else {
											$role = 'ordinary';
											if (isset($_SESSION['username'])) {
												$engname = $_SESSION['username'];
											}
										}
									}
?>
<select class="field" name="engnamedis" id="engnamedis">
 <?php if ($role == 'admin') {?>
									<option value="def">请选择</option>
								<?php }?>
	<?php
									require_once("lib/lib.php");
									
									list($errno, $data) = get_all_teachers();
									if ($errno)
										echo "<script>alert('获取教师信息失败-".$row."');</script>";
									$i=0;
									for ($i; $i < count($data); $i++) {
										if ($role == "admin"){
											echo "<option value='".$data[$i]['engname']."'>".$data[$i]['engname']."</option>";
										}else {
 											if($data[$i]['engname'] == $engname) {
												echo "<option value='".$data[$i]['engname']."'>".$data[$i]['engname']."</option>";
											}
										}
									}
								?>

</select><br/>
<label>条件</label>
<p>从:</p>
	<select class='year' name="yearfrom">
		<?php
			$today=date("Y-n-j");								
			$arr=explode("-",$today);
			$year=$arr[0];
			$tmp_year="2014";
			$i=0;
			for ($i;$i<16;$i++) {
				if ($tmp_year==$year) {
					echo "<option value='{$tmp_year}' selected='selected'>{$tmp_year}</option>";
				}	else {
					echo "<option value='{$tmp_year}'>{$tmp_year}</option>";
				}
				$tmp_year++;
			}
		?>
								</select>
								<select class='month' name="monthfrom">
								<?php
								$today=date("Y-n-j");								
								$arr=explode("-",$today);
								$month=$arr[1];
								$i=1;
								for ($i;$i<13;$i++) {
									if ($i == $month)
										echo "<option value='{$i}' selected='selected'>{$i}</option>";
									else
										echo "<option value='{$i}'>{$i}</option>";
								}
								?>
								</select>
								<select class='day' name="dayfrom">
								<?php
								$today=date("Y-m-j");								
								$arr=explode("-",$today);
								$day=$arr[2];
								$i=1;
								for ($i;$i<32;$i++) {
										echo "<option value='{$i}'>{$i}</option>";
								}
								?>
								</select>
<p>至:</p>
	<select class='year' name="yearto">
		<?php
			$today=date("Y-n-j");								
			$arr=explode("-",$today);
			$year=$arr[0];
			$tmp_year="2014";
			$i=0;
			for ($i;$i<16;$i++) {
				if ($tmp_year==$year) {
					echo "<option value='{$tmp_year}' selected='selected'>{$tmp_year}</option>";
				}	else {
					echo "<option value='{$tmp_year}'>{$tmp_year}</option>";
				}
				$tmp_year++;
			}
		?>
								</select>
								<select class='month' name="monthto">
								<?php
								$today=date("Y-n-j");								
								$arr=explode("-",$today);
								$month=$arr[1];
								$i=1;
								for ($i;$i<13;$i++) {
									if ($i == $month)
										echo "<option value='{$i}' selected='selected'>{$i}</option>";
									else
										echo "<option value='{$i}'>{$i}</option>";
								}
								?>
								</select>
								<select class='day' name="dayto">
								<?php
								$today=date("Y-m-j");								
								$arr=explode("-",$today);
								$day=$arr[2];
								$i=1;
								for ($i;$i<32;$i++) {
									if ($i == $day)
										echo "<option value='{$i}' selected='selected'>{$i}</option>";
									else
										echo "<option value='{$i}'>{$i}</option>";
								}
								?>
								</select>
<br/><br/>
<label>密码</label>
<input class='field' type='password' name='passworddis'/>
<br/>
<input class='submit'  type='submit' value='查询'/><span></span>
<div class='cl'>&nbsp;</div>
</div>

</form>

<form name="form1" method="post" action="">
<div class='sort'>
<label>英文名</label>
<?php 
							        $role = 'ordinary';									
									if (isset($_SESSION['role'])){
                                        if ($_SESSION['role'] == 'admin') {
										    $role = 'admin';
										} else {
											$role = 'ordinary';
											if (isset($_SESSION['username'])) {
												$engname = $_SESSION['username'];
											}
										}
									}
?>
<select class='field' name='engnamedel' id="engnamedel">
 <?php if ($role == 'admin') {?>
									<option value="def">请选择</option>
								<?php }?>
<?php
									require_once("lib/lib.php");
									
									list($errno, $data) = get_all_teachers();
									if ($errno)
										echo "<script>alert('获取教师信息失败-".$row."');</script>";
									$i=0;
									for ($i; $i < count($data); $i++) {
										if ($role == "admin"){
											echo "<option value='".$data[$i]['engname']."'>".$data[$i]['engname']."</option>";
										}else {
 											if($data[$i]['engname'] == $engname) {
												echo "<option value='".$data[$i]['engname']."'>".$data[$i]['engname']."</option>";
											}
										}
									}
								?>
</select>
<br/>
<label >班级</label>
	<select class='field' name='classiddel' id="classid">
		<option value="def">请选择</option>
				<?php
								
									require_once("lib/lib.php");
										$classes = get_running_class();
										echo $classes;
										for ($i=0;$i<count($classes);$i++) {
								            $tmp = $classes[$i];
											echo "<option value='$tmp'>".$tmp."</option>";	
										}	
							
				?>
	</select>
<br/>
<label>日期</label>
<select class='year' name="yeardel">
		<?php
			$today=date("Y-n-j");								
			$arr=explode("-",$today);
			$year=$arr[0];
			$tmp_year="2014";
			$i=0;
			for ($i;$i<16;$i++) {
				if ($tmp_year==$year) {
					echo "<option value='{$tmp_year}' selected='selected'>{$tmp_year}</option>";
				}	else {
					echo "<option value='{$tmp_year}'>{$tmp_year}</option>";
				}
				$tmp_year++;
			}
		?>
								</select>
								<select class='month' name="monthdel">
								<?php
								$today=date("Y-n-j");								
								$arr=explode("-",$today);
								$month=$arr[1];
								$i=1;
								for ($i;$i<13;$i++) {
									if ($i == $month)
										echo "<option value='{$i}' selected='selected'>{$i}</option>";
									else
										echo "<option value='{$i}'>{$i}</option>";
								}
								?>
								</select>
								<select class='day' name="daydel">
								<?php
								$today=date("Y-m-j");								
								$arr=explode("-",$today);
								$day=$arr[2];
								$i=1;
								for ($i;$i<32;$i++) {
									if ($i == $day)
										echo "<option value='{$i}' selected='selected'>{$i}</option>";
									else
										echo "<option value='{$i}'>{$i}</option>";
								}
								?>
								</select>


<br/><br/>
<label>密码</label>
<input class='field' type='password' name='passworddel'/>
<br/>
<input class='field'  style="background-color:#F9EBAE" type="button" onclick="form1.action='teacher_salary_manage.php?action=delete';form1.submit();" value="删除"/><span></span>
<div class='cl'>&nbsp;</div>
</div>
</form>

</div>

</body>
</html>

