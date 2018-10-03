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
        	$way = $_POST["way"];
        	$state = $_POST["state"];
        	$sale = $_POST["sale"];

		//$chname = decode_chinese($chname);
		list($errno, $errmsg) = demo_student_add($chname, $engname, $age, $gender, $school, 
							 $phone, $demo_class, $demo_date, $way, $state, $sale); 
		if ($errno) {
			return http_response_code(400);
		} else {
			return http_response_code(200);
		}

		break;
	}
										
	
								
