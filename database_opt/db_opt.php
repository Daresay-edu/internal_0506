<?php

function backup_db() {
	$time=date("Y-m-d");
	$cmd="C:/xampp/mysql/bin/mysqldump.exe -uroot -pdaresay2014 b5270951>db_backup/b5270951_".$time.".sql";
	//exec("C:/xampp/mysql/bin/mysqldump.exe -uroot -pdaresay2014 b5270951>C:/xampp/htdocs/internal_0506/db_backup/b5270951.sql");
	exec($cmd);
}
	function db_conn($mysql_database)

	{
		ini_set('max_execution_time','1000');
		//backup_db();
		//$mysql_server_name='localhost';
		//$mysql_username='b5270951'; //云主机数据库访问用户名
		//$mysql_password='D40B8B78ACfeaf'; //云主机数据库访问密码
		//$mysql_username='root';
		//$mysql_password='daresay2014';
		//$mysql_database='b5270951';//云主机上的数据库名字
		
		$mysql_server_name='sqld-gz.bcehost.com:3306';
		$mysql_username='d9e7f33f04e64fc0b989537af1dbf458';
		$mysql_password='75575f76656c4f778c1b9ab7c70e47e7';
		$mysql_database='UjldrFKYrZWDHQtNJoSz';//云主机上的数据库名字
		$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password,$mysql_database);
		if (!$conn)
		{
			die('Could not connect: ' . mysql_error());
		}
		//$mysql_database="b5270951";
		$db_selected = mysql_select_db($mysql_database,$conn);
		return $conn;
		
	}
?>
