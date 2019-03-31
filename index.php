<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Daresay Education</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
</head>
<body bgcolor="#FFFF66">
<?php
    session_start();
	if(!isset($_SESSION['username'])){
		header('Location: login.php');
	} else {
		header('Location: mail_index.php');
	}

?>
</body>
</html>