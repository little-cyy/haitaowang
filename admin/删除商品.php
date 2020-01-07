<?php 
    
	include '../php/conn.php'; 
	$id = $_GET['id']; 
	$query ="delete from shangpin where id=$id"; 
	$result=$mysqli->query($query);  
	
	if($result && $mysqli->affected_rows>0){  
		$url = "后台商品显示.php";
		echo "<script language='javascript' type='text/javascript'>"; 
		echo "window.location.href= '$url'";  
		echo "</script>"; 
	}
	$mysqli->close(); 
?>