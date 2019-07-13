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
<script>
function check_submit(){
	var engname = document.getElementById("engname").value;
	var password = document.getElementById("password").value;
	if (engname.length == 0 || password.length == 0) {
		alert("英文名和密码不能为空");
		return false;
	} else {
		return true;
	}
}
</script>
<body> 

<div class="login">
    <div class="message">Daresay Education</div>
    <div id="darkbannerwrap"></div>
    
    <form name="lg" id="lg" action="login.php?action=check" method="post" onsubmit="return check_submit();">
		<input name="action" value="login" type="hidden">
        <select name='role' id="role">
		    <option value="teacher">Teacher</option>
			<option value="sale">Sale</option>
			<option value="admin">admin</option>
		</select>
		<hr class="hr15">
		<input name="engname" id="engname" placeholder="用户名" required="required" type="text">
		<hr class="hr15">
		<input name="password" id="password" placeholder="密码" required="required" type="password">
		<hr class="hr15">
		<input type="submit" class= 'submit' name="add" value="登录"/>
		<hr class="hr20">
		<!-- 帮助 <a onClick="alert('请联系管理员')">忘记密码</a> -->
	</form>
    <?php
				require_once("lib/db_opt.php");
					if (isset($_GET["action"])){
						switch($_GET["action"]) {
							case "check":
								$role = $_POST["role"];
							    $engname = $_POST["engname"];
								$password=$_POST["password"];
								$conn=db_conn("daresay_db");
								
								$table_name="teachers";
									$sql="SELECT * FROM {$table_name} WHERE engname='$engname' and role='$role'";
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
										$_SESSION['role'] = $role;
										if ($role=='sale') {
											$url="demo_student_add.php";
										} else {
											$url="mail_index.php";
										}
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