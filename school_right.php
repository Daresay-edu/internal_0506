<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>DareSay Education</title>
<link rel="stylesheet" href="css/jquery.fancybox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
<script type="text/javascript" src="js/daresay.js"></script>
</head>
<body>

<div class='box-content'>
<a href='school_add.php' class='add-button'><span>Add new school</span></a>
<div class='cl'>&nbsp;</div>

<form action="school_manage.php?action=display" method="post">
<div class='sort'>
<label>School ID</label>
<select class='field' name='schoolid' id="schoolid">
<option value="All">All</option>
<?php
	require_once("lib/lib.php");
	list($errno, $data) = get_all_school();
	if ($errno)
		echo "<script>alert('获取学校信息失败-".$row."');</script>";
	$i=0;
	for ($i; $i < count($data); $i++) {
		echo "<option value='".$data[$i]['schoolid']."'>".$data[$i]['schoolid']."</option>";
	}
?>

</select>
<br/>
<input type='submit' class='submit' value='Display School'/><span></span>
<div class='cl'>&nbsp;</div>
</div>

</form>

<form name="form1" method="post" action="">
<div class='sort'>
<label>School ID</label>
<select class='field' name='schoolid1' id="schoolid1">
<?php
	require_once("lib/lib.php");
	list($errno, $data) = get_all_school();
	if ($errno)
		echo "<script>alert('获取学校信息失败-".$row."');</script>";
	$i=0;
	for ($i; $i < count($data); $i++) {
		echo "<option value='".$data[$i]['schoolid']."'>".$data[$i]['schoolid']."</option>";
	}
?>

</select>
<br/>
<input type="button" class='submit' onclick="form1.action='school_manage.php?action=delete';form1.submit();" value="Delete"/><span></span>
<div class='cl'>&nbsp;</div>
</div>
</form>

</div>
</body>
</html>

