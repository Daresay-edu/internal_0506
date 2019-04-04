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
    function foo(){
        if(confirm("确认删除吗？")){
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
a{ 
 text-decoration:none
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
				<h2 class="left">学员积分</h2>
				</div>
				<!-- End Box Head -->	

				<!-- Table -->
				<div class="vidoes">
				<!-- Add Videos -->
				<br/>
				<table border="0" width="700">
				<?php
				header("Content-type: text/html;charset=utf-8");
				 require_once("lib/db_opt.php");
				 $conn=db_conn("daresay_db");
				$sql="SELECT * FROM credit";
				$result=mysql_query($sql,$conn);
                                if (!$result)
                                	die("SQL: {$sql}<br>Error:".mysql_error());
                                	echo "<table>";
                                	echo "<tr>";
                                	echo "<td>ID</td>";
                                	echo "<td>班级</td>";
                                	echo "<td>英文姓名</td>";
                                        echo "<td>积分缘由</td>";
                                	echo "<td>日期</td>";
                                	echo "<td>积分</td>";
                                	echo "<td>操作</td>";
                                	echo "</tr>";
                                	$i=1;
                                	while ($row = mysql_fetch_assoc($result)) {
                                		echo "<tr>";
                                		echo "<td>".$i++."</td>";
                                		echo "<td>".$row['classid']."</td>";
                                		echo "<td>".$row['engname']."</td>";
                                		echo "<td>".$row['reason']."</td>";
                                		echo "<td>".$row['date']."</td>";
                                		echo "<td>".$row['credit']."</td>";
                                		echo "<td>";
						echo "<a href=students_credit_manage.php?action=modify&classid=".$row['classid']."&engname=".$row['engname']."&reason=".$row['reason']."&date=".$row['date']."&credit=".$row['credit']."&note=".$row['note']."><input class='field'  style='background-color:#F9EBAE' type='button' value='Modify'></a><br/>";
						echo "<a onclick='return foo();' href=students_credit_manage.php?action=delete&classid=".$row['classid']."&engname=".$row['engname']."&reason=".$row['reason']."&date=".$row['date']."&credit=".$row['credit']."&note=".$row['note']."><input class='field'  style='background-color:#F9EBAE' type='button' value='Delete'></a>";
						echo"</td>";
                                		echo "</tr>";
                                	}
                                echo "</table>";
                                echo "<br/><br/>";
                                
                                ?>
                    			   </table>

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
						<h2>学员积分管理</h2>
					</div>
					<!-- End Box Head-->
					<?php
						include "students_credit_right.php";	
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
