<?php
	$host = "localhost";
	$dbname = "haitaowang";
	$username = "root";
	$password = "";

	$mysqli = new mysqli($host, $username, $password, $dbname);  
	$mysqli->set_charset('utf8');

	if ($mysqli->connect_errno) {
	    printf("连接失败: %s\n", $mysqli->connect_error);
	    exit();
	}
?>
