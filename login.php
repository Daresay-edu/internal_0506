<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<meta http-equiv="Pragma" content="no-cache"> 
<meta http-equiv="Cache-Control" content="no-cache"> 
<meta http-equiv="Expires" content="0"> 
<title>Daresay Education</title> 
<link href="css/login.css" type="text/css" rel="stylesheet"> 
</head> 
<body> 

<div class="login">
    <div class="message">Daresay Education</div>
    <div id="darkbannerwrap"></div>
    
    <form action="login.php?action=check" method="post">
		<input name="action" value="login" type="hidden">
		<input name="engname" id="engname" placeholder="用户名" required="" type="text">
		<hr class="hr15">
		<input name="password" id="password" placeholder="密码" required="" type="password">
		<hr class="hr15">
		<input type="submit" class= 'submit' name="add" value="登录" onclick="return check_login();"/>
		<hr class="hr20">
		<!-- 帮助 <a onClick="alert('请联系管理员')">忘记密码</a> -->
	</form>
    <?php
				require_once("lib/db_opt.php");
					if (isset($_GET["action"])){
						switch($_GET["action"]) {
							case "check":
							    $engname = $_POST["engname"];
								$password=$_POST["password"];
								$conn=db_conn("daresay_db");
								
								$table_name="teachers";
									$sql="SELECT * FROM {$table_name} WHERE engname='$engname'";
									$result=mysql_query($sql,$conn);
									if (!$result) {
										die("SQL: {$sql}<br>Error:".mysql_error());
									}
									$row = mysql_fetch_assoc($result);
									if ($password != $row['password']) {
									
										echo "<script>alert('口令不对');</script>";
										exit;
									} else {
										echo "<script>alert('test');</script>";
										//set session
										session_start();
										$_SESSION['username']=$engname;
 										if ($_SESSION['username'] == "admin") {
											$_SESSION['role'] = "admin";
										} else {
											$_SESSION['role'] = "ordinary";
										}
								
										$url="mail_index.php";
                                        header("Location: $url"); 
									}
								
								mysql_close($conn);
						}
					}
					?>
	
</div>

<div class="copyright">© 2014 by Daresay Education</div>

</body>
</html>