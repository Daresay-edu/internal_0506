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
<a href='demo_student_add.php' class='add-button'><span>Add new demo student</span></a>
<div class='cl'>&nbsp;</div>

<form action="demo_student_manage.php?action=display" method="post">
<div class='sort'>

<label>试听时间:</label>
<p>From:</p>
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
<p>To:</p>
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
<p>State:</p>
	<select class='year' name="state">
		<option value='All'>All</option>
		<option value='未试听'>未试听</option>
		<option value='已试听'>已试听</option>
		<option value='已报名'>已报名</option>
	</select>
<br/><br/>
<br/>
<input class='submit'  type='submit' value='Display Record'/><span></span>
<div class='cl'>&nbsp;</div>
</div>

</form>

</div>

</body>
</html>

