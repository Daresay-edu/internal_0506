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
	require_once("../lib/lib.php");
	require_once("../lib/err.php");

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
        	$chief_teacher = $_POST["chief_teacher"];
        	$assis_teacher = $_POST["assis_teacher"];
        	$way = $_POST["way"];
        	$state = $_POST["state"];
        	$sale = $_POST["sale"];

		list($errno, $data) = demo_student_add($chname, $engname, $age, $gender, $school, 
							 $phone, $demo_class, $demo_date, $chief_teacher, 
							 $assis_teacher, $way, $state, $sale); 
		if ($errno) {
			return http_response_code(400);
		} else {
			return http_response_code(200);
		}

		break;
	    case "demo_stu_query":
        	//$sale = $_GET["sale"];
        	//$sale = $_POST["sale"];
		$sale = "Edward";

		list($errno, $data) = demo_student_query_by_saleman($sale); 
		if ($errno) {
			return http_response_code(400);
		} else {
			header('Content-Type: application/json');
			//print_r(json_encode($data));
			//$res=array("name"=>$data['name'], "phone"=>$data['phone']);
			//echo json_encode($res);
			return json_encode($data);
		}
		break;
	    case "parents_message_add":
        	$classid = $_POST["p_classid"];
        	$engname = $_POST["p_engname"];
        	$title = $_POST["message_title"];
        	$phone = $_POST["parents_phone"];
        	$message = $_POST["message_content"];

		$mail_title = "New parent message from [".$classid." ".$engname."]";
		$mail_content = "Title: ".$title."\n\n\n\nPhone: ".$phone."\n\n\n\nMessage: ".$message;
		send_mail_to_admin($mail_title, $mail_content);

		list($errno, $data) = parents_message_add ($classid, $engname, $title, $phone, $message); 
		if ($errno) {
			return http_response_code(400);
		} else {
			return http_response_code(200);
		}
		break;
	    case "password_modify":
        	$classid = $_POST["p_classid"];
        	$engname = $_POST["p_engname"];
        	$new_password = $_POST["new_password"];

		list($errno, $data) = password_modify ($classid, $engname, $new_password); 
		if ($errno) {
			return http_response_code(400);
		} else {
			return http_response_code(200);
		}
		break;
	}
										
	
								
