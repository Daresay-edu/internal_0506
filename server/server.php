<?php
function decode_chinese ($string) {
	return iconv('euc-cn', 'utf-8', $string);

}
function test_encoding ($string) {
	$encode = mb_detect_encoding($string, array("ASCII","UTF-8","GB2312","GBK","BIG5")); 
	echo $encode;

}
	//should add all server functions here
	header("Content-type: text/html;charset=utf-8");
	require 'public/Initialize.php';
	require_once("public/db_opt.php");
        $conn=db_conn("daresay_db");

	switch($_GET["action"]) {
	    case "demo_stu_add":
        	$chname = $_POST["ch_name"];
        	$engname = $_POST["eng_name"];
        	$age = $_POST["age"];
        	$gender = $_POST["gender"];
        	$school = $_POST["school"];
        	$phone = $_POST["phone"];
        	$demo_class = $_POST["demo_class"];
        	$demo_date = $_POST["demo_date"];
        	$way = $_POST["way"];
        	$sale = $_POST["sale"];

		//$chname = decode_chinese($chname);

		$sql="SELECT * FROM demo_students WHERE engname='$engname' and name='$chname'";
		$result=mysql_query($sql,$conn);
		if (!$result) {
			$errmsg = "Query demo student failed.";
			echo $errmsg;
			return http_response_code(400);
		} else {
			$row = mysql_fetch_assoc($result);
                        if ($row) {
				$errmsg = "Student already exist.";
				echo $errmsg;
				return http_response_code(400);
                        } else {
				//insert students to demo_students table
				$sql="INSERT INTO demo_students (name, engname, age, gender, phone, school, classid, 
					date,  way, saleman, stuid)
				      VALUES ('$chname', '$engname', '$age','$gender', '$phone', '$school', '$demo_class',
				      '$demo_date','$way', '$sale', '0');";
				$result=mysql_query($sql,$conn);
				if (!$result) {
					echo "add demo student fail";
					return http_response_code(400);
				} else { 
                        		echo "success";
					return http_response_code(200);                                                                                                   
				}
			}
		}
		break;
	}
										
	mysql_close($conn);
								
