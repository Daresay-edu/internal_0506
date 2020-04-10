<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>中北镇机构疫情报告统计</title>
<link rel="stylesheet" href="css/jquery.fancybox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/datedropper.css">
<script type="text/javascript" src="js/daresay.js"></script>
</head>
<script>
function gotodis(){
	//alert("test");
	var year=document.getElementById("yearto");
	var month=document.getElementById("monthto");
	var day=document.getElementById("dayto");
	var date=year.value+"-"+month.value+"-"+day.value;
	//alert(date);
	//var type=document.getElementById("type");
	//var report_type=document.getElementById("report_type");
	window.location.href="XQ.php?date="+date+"&type=3";
}
</script>
<body>

<div class='box-content'>
<div class='cl'>&nbsp;</div>

<form action="win.php?action=display" method="post">
<div class='sort'>
<label>请选择报告时间:</label>
</br></br>
	<select class='year' name="yearto" id="yearto">
		<?php
			$today=date("Y-m-d");								
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
								<select class='month' name="monthto" id="monthto">
								<?php
								$today=date("Y-m-d");								
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
								<select class='day' name="dayto" id="dayto">
								<?php
								$today=date("Y-m-d");								
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
<br/>
<input class='submit'  type='button' value='查询' onClick="return gotodis();"/><span></span>
<div class='cl'>&nbsp;</div>
</div>

</form>

</div>

</body>
</html>

