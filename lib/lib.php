<?php
include("err.php");
require_once("db_opt.php");
require_once "email.class.php";
#require_once("../phpmail/sendmail_interface.php");
########### functions for school ###############
function get_all_school () {
	$return = array();
	$conn=db_conn("daresay_db");
	$sql="SELECT * FROM school";
	$result=mysql_query($sql,$conn);
	if (!$result) {
		$errmsg = "get all school failed.";
		$return[] = DX_ERROR;
		$return[] = $errmsg; 
		goto go_out;
	}

	$ret_arr = array();
	$i = 0;
	while ($row = mysql_fetch_assoc($result)) {
		$ret_arr[$i++] = $row; 
	}

	$return[] = DX_SUCCESS;
	$return[] = $ret_arr; 
go_out:
	mysql_close($conn);
	return $return;

}
########### functions for class ###############
function get_current_hour($classid, $sec_hour){
	require_once("db_opt.php");
	$conn=db_conn("daresay_db");
	//read the class record info and get the hour
	$table_name="class_info_record";
	$sql="SELECT * FROM {$table_name} where classid='$classid'";
	$result=mysql_query($sql,$conn);
	$big_hour=0;
	$record_hour=0;
	$record_hour_sec = 0;
	while ($row = mysql_fetch_assoc($result)) {
		$tmp_hour=$row['hour'];
		$tmp_date=$row['date'];
		list($fir_hour,$sec_hour)=explode("-",$tmp_hour);
		if ($big_hour < $fir_hour) {
			$big_hour=$fir_hour;	
			$record_hour=$tmp_hour;
			$record_hour_sec = $sec_hour;
		}
	}
	mysql_close($conn);
	if ($sec_hour === true) {
		return $record_hour_sec;
	}else {
		return $record_hour;
	}
}	
function who_need_pay($classid){
	require_once("db_opt.php");
	$conn=db_conn("daresay_db");
	$needpay_students=array();
	$i=0;

	$sql="SELECT * FROM students where classid='$classid'";
	$result=mysql_query($sql,$conn);
	while ($row = mysql_fetch_assoc($result)) {
		$need_pay=$row['hour_end'];
		$engname=$row['engname'];
		list($fir_class,$sec_class) = explode("-",$class_num);
		if ($need_pay - $sec_class <= 10) {
			$needpay_students[$i]=$row["engname"];
			$i++;
		}
	}
	mysql_close($conn);
	return $needpay_students;
}	
function is_normal_class($classid) {
		$ret=0;
		$char=substr($classid, 0, 1);
		if ($char == "K" || 
			$char == "S" || 
			$char == "k" || 
			$char == "s") {
			$ret=1;
		}
		return $ret;
			
}
function get_running_class() {
	require_once("db_opt.php");
	$conn=db_conn("daresay_db");
	$running_class =array();
	$i=0;

	$sql="SELECT * FROM class";
	$result=mysql_query($sql,$conn);
	while ($row = mysql_fetch_assoc($result)) {
		$tmp=$row['classid'];
		if (!is_normal_class($tmp)) 
			continue;
		$sql="SELECT * FROM class_info_record WHERE classid='$tmp' and hour='191-192'";
        $result1=mysql_query($sql,$conn);
		$row1 = mysql_fetch_assoc($result1);
		if ($row1)
             continue;												
		$running_class[$i]=$tmp;
		$i++;										
		
	}
	mysql_close($conn);
	sort($running_class);
	return $running_class;
}
function get_normal_class() {
	require_once("db_opt.php");
	$conn=db_conn("daresay_db");
	$running_class =array();
	$i=0;

	$sql="SELECT * FROM class";
	$result=mysql_query($sql,$conn);
	while ($row = mysql_fetch_assoc($result)) {
		$tmp=$row['classid'];
		if (!is_normal_class($tmp)) 
			continue;											
		$running_class[$i]=$tmp;
		$i++;										
		
	}
	mysql_close($conn);
	sort($running_class);
	return $running_class;
}
function get_all_class() {
	require_once("db_opt.php");
	$conn=db_conn("daresay_db");
	$running_class =array();
	$i=0;

	$sql="SELECT * FROM class";
	$result=mysql_query($sql,$conn);
	while ($row = mysql_fetch_assoc($result)) {
		$tmp=$row['classid'];											
		$running_class[$i]=$tmp;
		$i++;										
		
	}
	mysql_close($conn);
	sort($running_class);
	return $running_class;
}

function get_class_date($classid){
	require_once("db_opt.php");
	$return = array ();
	$conn=db_conn("daresay_db");
	//read the class record info and get the hour
	$table_name="class_info_record";
	$sql="SELECT * FROM {$table_name} where classid='$classid'";
	$result=mysql_query($sql,$conn);
	if (!$result) {
		$errmsg = "get all class failed.";
		$return[] = DX_ERROR;
		$return[] = $errmsg; 
		goto go_out;
	}

	$tmp_date = "";
	while ($row = mysql_fetch_assoc($result)) {
		$tmp_date=$row['date'];
	}
	$return[] = DX_SUCCESS;
	$return[] = $tmp_date; 
go_out:
	mysql_close($conn);
	return $return;
}	
function print_remind_by_classid($classid) {
	if (is_normal_class($classid)) {
		static $num=1;
		$conn=db_conn("daresay_db");
		$table_name="class";
		$sql="SELECT * FROM {$table_name} WHERE classid='$classid'";
		$result=mysql_query($sql,$conn);
		if (!$result)
			die("SQL: {$sql}<br>Error:".mysql_error());	
		$row = mysql_fetch_assoc($result);
		$current_hour = get_current_hour($classid, False);
		if($current_hour == "191-192")
			return 1;

		list($errno, $class_date) = get_class_date($classid);
		if ($errno) 
			echo "get class date failed";
		
	        $school = $row['school'];
		list($fir_tm,$sec_tm) = array_pad(explode(",", $row['class_time'], 2), 2 , null);
	    echo "<h1 align='center'>".$num++." 班级: ".$classid."   课时：".$current_hour." [".$class_date."]   上课时间：".$row['class_time']."</h1>";
		echo "<table border='1' align='center'>";

		list($fir_class,$sec_class) = array_pad(explode("-", $current_hour, 2), 2 , null);
		//who need to pay
		$sql="SELECT * FROM students where classid='$classid'";
		$result=mysql_query($sql,$conn);
		while ($row = mysql_fetch_assoc($result)) {
			$need_pay=$row['hour_end'];
			$engname=$row['engname'];
			if ($need_pay - $sec_class <= 10) {
				echo "<tr>";
					
					echo "<td cellpadding='20' bgcolor='7ECD8C'><B>[缴费提醒]</B>".$row['engname']."缴费到第<B>".$need_pay."</B>课时</td>";
					echo "<td><input type='button' id='makeup_finish' value='Pay' onClick=''/></td>";
				echo "</tr>";
			}
		}
		//who need to make up
		$sql="SELECT * FROM absent";
		$result=mysql_query($sql,$conn);
		$i=0;
		while ($row = mysql_fetch_assoc($result)) {
			$ab_hour=$row['ab_hour'];
			$aclassid=$row['classid'];
			$engname=$row['engname'];
			$finish=$row['finish'];
			$cl1 = substr($classid,0,2);
			$cl2 = substr($aclassid,0,2);
			list($fir_ab, $sec_ab) = array_pad(explode("-", $ab_hour, 2), 2, null);
			if (($fir_ab <= ($fir_class+4)) && ($sec_class < $sec_ab) && ($cl1 == $cl2) && ($finish=="no")) {
				if ($fir_class+2 == $fir_ab)
					$makeup_tm = $fir_tm;
				else 
					$makeup_tm = $sec_tm;
				echo "<tr>";
					$str="[补课通知]请".$aclassid."班".$engname."于".$makeup_tm."来".$classid."(".$school."校区)补第".$ab_hour."课时，收到请回复。如果当天不能来补课，请微信中通知我，谢谢您的配合！";
					echo "<td>".$str."<input type='text' id='$i' value='$str'/></td>";
					echo "<td><a href='#' target='_self' id='$aclassid&$engname&$ab_hour&$classid&$i' onClick='javascript:return makeup_finish(this.id);'>DONE</a></td>";
				echo "</tr>";
			}
			$i++;
		}	
		echo "</table>";	
		return 1;
	} else {
		return 0;
	}
} 
function print_class_record_info($classid) {
	$conn=db_conn("daresay_db");
	$table_name="class_info_record";
	$sql="SELECT * FROM {$table_name} where classid='$classid' order by id desc";
	$result=mysql_query($sql,$conn);
	if (!$result)
		die("SQL: {$sql}<br>Error:".mysql_error());
	echo $classid."班课程记录"."<br/><br/>";
	echo "<table border='1' width='700' border-collapse='collapse'>";
	echo "<tr>";
		echo "<td>课时</td>";
		echo "<td>课程内容</td>";
		echo "<td>上课时间</td>";
		echo "<td>缺勤学生</td>";
		echo "<td>备注</td>";
	echo "</tr>";
	$i=1;
	while ($row = mysql_fetch_assoc($result)) {
		echo "<tr>";
		echo "<td>".$row['hour']."</td>";
		echo "<td>".$row['class_info']."</td>";
		echo "<td>".$row['date'].$row['week']."</td>";
		echo "<td>".$row['absent']."</td>";
		echo "<td>".$row['note']."</td>";
		echo "</tr>";
	}
	echo "</table>";
	echo "<br/><br/>";
							
}
########### functions for students ###############
function gen_password ($engname) {
    $tmp_ascii = "";
    for($i=0;$i<strlen($engname);$i++){
    	$tmp_ascii=$tmp_ascii.ord($engname[$i]);
    	//echo ord($engname[$i]);
    }
    return substr($tmp_ascii,1,4);
}
function student_add ($name, $engname, $age, $sex, 
                           $school, $phone, $classid, $charge, 
			   $hour_begin, $hour_end, $pay_time,$credit, $note) {
	$return = array();
	$conn=db_conn("daresay_db");
	$sql="SELECT * FROM students WHERE engname='$engname' and classid='$classid'";
	$result=mysql_query($sql,$conn);
	if (!$result) {
		$errmsg = "Query students failed.";
		$return[] = DX_ERROR;
		$return[] = $errmsg; 
		goto go_out;
	}
	$row = mysql_fetch_assoc($result);
	if ($row) {
		$errmsg = "students already exist.";
		$return[] = DX_ERROR;
		$return[] = $errmsg; 
		goto go_out;
	}

	// insert into students table
	$sql="INSERT INTO students (name, engname, classid, age, phone,school, pay_time, 
		charge,  hour_begin, hour_end, note, sex, credit)
	      VALUES ('$name', '$engname', '$classid', '$age', '$phone', '$school', '$pay_time',
	      '$charge','$hour_begin', '$hour_end','$note', '$sex', '$credit');";
	$result=mysql_query($sql,$conn);
	if (!$result) {
		$errmsg = "Insert students failed.";
		$return[] = DX_ERROR;
		$return[] = $errmsg; 
		goto go_out; 
	} else {

                $errmsg = "Success";
		$return[] = DX_SUCCESS;
		$return[] = $errmsg; 
		goto go_out; 
	}
go_out:
	mysql_close($conn);
	return $return;
}
function password_modify ($classid, $engname, $new_password) {
	$return = array();
	$conn=db_conn("daresay_db");
	$sql="UPDATE online_user SET passwd='$new_password' WHERE classid='$classid' AND engname='$engname'";
										 
	$result=mysql_query($sql,$conn);
	if (!$result) {
		$errmsg = "modify passowrd failed.";
		$return[] = DX_ERROR;
		$return[] = $errmsg; 
		return $return;
	} else {
		$errmsg = "Success.";
		$return[] = DX_SUCCESS;
		$return[] = $errmsg; 
		return $return;
	}
	mysql_close($conn);
}

########### functions for demo students ###############
function demo_student_add ($chname, $engname, $age, $gender, 
                           $school, $phone, $demo_class, $demo_date, 
			   $chief_teacher, $assis_teacher, $way, $state, $sale, $note) {
	$conn=db_conn("daresay_db");
	$sql="SELECT * FROM demo_students WHERE engname='$engname' and name='$chname'";
	$result=mysql_query($sql,$conn);
	if (!$result) {
		$errmsg = "Query demo student failed.";
		$return[] = DX_ERROR;
		$return[] = $errmsg; 
		return $return;
	} else {
		$row = mysql_fetch_assoc($result);
                if ($row) {
			$errmsg = "Student already exist.";
			$return[] = DX_ERROR;
			$return[] = $errmsg; 
			return $return;
                } else {
			//insert students to demo_students table
			$sql="INSERT INTO demo_students (name, engname, age, gender, phone, school, demo_in, 
				demo_date, chief_teacher, assis_teacher,  state, way, saleman, stuid, join_into, note)
			      VALUES ('$chname', '$engname', '$age','$gender', '$phone', '$school', '$demo_class',
			      '$demo_date','$chief_teacher', '$assis_teacher', '$state', '$way', '$sale', '0', '0', '$note');";
			$result=mysql_query($sql,$conn);
			if (!$result) {
				$errmsg = "Add demo student fail";
				$return[] = DX_ERROR;
				$return[] = $errmsg; 
				return $return;
			} else { 
                		$errmsg = "Success";
				$return[] = DX_SUCCESS;
				$return[] = $errmsg; 
				return $return;
			}
		}
	}
	mysql_close($conn);
}

function demo_student_query_by_name ($name, $engname) {
	$conn=db_conn("daresay_db");
	$sql="SELECT * FROM demo_students WHERE name='$name' and engname='$engname'";
	$result=mysql_query($sql,$conn);
	if (!$result) {
		$errmsg = "Query demo student failed.";
		$return[] = DX_ERROR;
		$return[] = $errmsg; 
		return $return;
	} else {
		$row = mysql_fetch_assoc($result);
		$return[] = DX_SUCCESS;
		$return[] = $row; 
		return $return;
	}
	mysql_close($conn);
}
function demo_student_query_by_date ($from, $end, $state) {
	$conn=db_conn("daresay_db");
	$sql="SELECT * FROM demo_students";
	$result=mysql_query($sql,$conn);
	if (!$result) {
		$errmsg = "Query demo student failed.";
		$return[] = DX_ERROR;
		$return[] = $errmsg; 
		return $return;
	} else {
		$ret_arr = array();
		$i = 0;
		while ($row = mysql_fetch_assoc($result)) {
			$tmp_date = $row['demo_date'];
			if (strtotime($tmp_date) < strtotime($from) || strtotime($tmp_date) > strtotime($end))
				continue;
			if (strcmp($state, $row['state']) && strcmp($state, 'All'))
				continue;
			$ret_arr[$i++] = $row; 
		}

		$return[] = DX_SUCCESS;
		$return[] = $ret_arr; 
		return $return;
	}
	mysql_close($conn);
}
function demo_student_query_update_state ($state) {
	$conn=db_conn("daresay_db");
	$sql="SELECT * FROM demo_students";
	$result=mysql_query($sql,$conn);
	if (!$result) {
		$errmsg = "Query demo student failed.";
		$return[] = DX_ERROR;
		$return[] = $errmsg; 
		return $return;
	} else {
		$ret_arr = array();
		$i = 0;
		while ($row = mysql_fetch_assoc($result)) {
			$tmp_date = $row['demo_date'];
			if (strtotime($tmp_date) < strtotime($from) || strtotime($tmp_date) > strtotime($end))
				continue;
			$ret_arr[$i++] = $row; 
		}

		$return[] = DX_SUCCESS;
		$return[] = $ret_arr; 
		return $return;
	}
	mysql_close($conn);
}

function demo_student_delete ($name, $engname) {
	$conn=db_conn("daresay_db");
	$sql="DELETE FROM demo_students WHERE engname='$engname' and name='$name'";
	$result=mysql_query($sql,$conn);
	if (!$result) {
		$errmsg = "Delete demo student failed.";
		$return[] = DX_ERROR;
		$return[] = $errmsg; 
		return $return;
	} else {
		$errmsg = "Success.";
		$return[] = DX_SUCCESS;
		$return[] = $errmsg; 
		return $return;
	}
	mysql_close($conn);
}

function demo_student_modify ($oldname, $oldengname, $chname, $engname, $age, $gender, 
                           $school, $phone, $demo_class, $demo_date, 
			   $chief_teacher, $assis_teacher, $way, $state, $sale, $stuid, $join_into, $note) {
	$conn=db_conn("daresay_db");
	$sql="UPDATE demo_students SET name='$chname', engname='$engname', age='$age', gender='$gender', 
		school='$school', phone='$phone', demo_in='$demo_class', demo_date='$demo_date', 
		chief_teacher='$chief_teacher', assis_teacher='$assis_teacher', way='$way',
		state='$state', saleman='$sale', stuid='$stuid', join_into='$join_into', note='$note' 
		WHERE name='$oldname' AND engname='$oldengname'";
										 
	$result=mysql_query($sql,$conn);
	if (!$result) {
		$errmsg = "modify demo student failed.";
		$return[] = DX_ERROR;
		$return[] = $errmsg; 
		return $return;
	} else {
		$errmsg = "Success.";
		$return[] = DX_SUCCESS;
		$return[] = $errmsg; 
		return $return;
	}
	mysql_close($conn);
}

function demo_student_turn_real($oldname, $oldengname, $chname, $engname, $stuid, $join_into) {
	$conn=db_conn("daresay_db");
	$sql="UPDATE demo_students SET name='$chname', engname='$engname', state='已报名', stuid='$stuid', join_into='$join_into'
		WHERE name='$oldname' AND engname='$oldengname'";
										 
	$result=mysql_query($sql,$conn);
	if (!$result) {
		$errmsg = "modify demo student failed.";
		$return[] = DX_ERROR;
		$return[] = $errmsg; 
	} else {
		$errmsg = "Success.";
		$return[] = DX_SUCCESS;
		$return[] = $errmsg; 
	}
go_out:
	mysql_close($conn);
	return $return;
}
########### functions for parents message ###############
function parents_message_add($classid, $engname, $title, $phone, $message) {
	$return = array();
	$conn=db_conn("daresay_db");
	$sql="INSERT INTO parents_message (engname, classid, title, phone, message)
	      VALUES ('$engname', '$classid', '$title', '$phone', '$message');";
	$result=mysql_query($sql,$conn);
	if (!$result) {
		$errmsg = "Insert message failed.";
		$return[] = DX_ERROR;
		$return[] = $errmsg; 
		goto go_out; 
	} else {

                $errmsg = "Success";
		$return[] = DX_SUCCESS;
		$return[] = $errmsg; 
		goto go_out; 
	}
go_out:
	mysql_close($conn);
	return $return;
}
########### functions for mail ###############
function send_mail($email_addr,$email_title,$email_content) {
			//$classid = $_POST["classid"];
			//$class_num = $_POST["begin_class"];
			$smtpserver = "smtp.sina.com";//SMTP服务器
			$smtpserverport =587;//SMTP服务器端口
			$smtpusermail = "daresay2014@sina.com";//SMTP服务器的用户邮箱
			$smtpuser = "daresay2014@sina.com";//SMTP服务器的用户帐号
			$smtppass = "daresay20140506";//SMTP服务器的用户密码 就是邮箱登陆密码
			$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
			
			$smtpemailto=$email_addr;
			$mailtitle=$email_title;
			$mailcontent=$email_content;
			$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
			$smtp->debug = false;//是否显示发送的调试信息
			$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);
	
}
function send_mail_to_admin ($mail_title, $mail_content) {
	$admin_mail = "18020023616@163.com";
        send_mail($admin_mail, $mail_title, $mail_content);
} 
########### functions for teacher ###############
function get_all_teachers () {
	$return = array();
	$conn=db_conn("daresay_db");
	$sql="SELECT * FROM teachers";
	$result=mysql_query($sql,$conn);
	if (!$result) {
		$errmsg = "get all school failed.";
		$return[] = DX_ERROR;
		$return[] = $errmsg; 
		goto go_out;
	}

	$ret_arr = array();
	$i = 0;
	while ($row = mysql_fetch_assoc($result)) {
		$ret_arr[$i++] = $row; 
	}

	$return[] = DX_SUCCESS;
	$return[] = $ret_arr; 
go_out:
	mysql_close($conn);
	return $return;
} 
?>
