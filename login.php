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
    
    <form action="login_action.php?action=check" method="post">
		<input name="action" value="login" type="hidden">
		<input name="engname" id="engname" placeholder="用户名" required="" type="text">
		<hr class="hr15">
		<input name="password" id="password" placeholder="密码" required="" type="password">
		<hr class="hr15">
		<input type="submit" class= 'submit' name="add" value="登录"/>
		<hr class="hr20">
		<!-- 帮助 <a onClick="alert('请联系管理员')">忘记密码</a> -->
	</form>

	
</div>

<div class="copyright">© 2019 by <a href="http://www.mycodes.net/" target="_blank">Daresay Education</a></div>

</body>
</html>