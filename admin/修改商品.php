<pre name="code" class="php">
<?php 
	include '../php/conn.php';	
	$id=$_GET['id']; 
	$query="SELECT * FROM shangpin WHERE id =".$id; 
	$result = $mysqli->query($query); 
	while ($rs=$result->fetch_array(MYSQLI_ASSOC)){ 
?> 
	<FORM METHOD="POST" ACTION="修改商品.php?id=<?=$rs['id']?>"> 
		<input type="hidden" name="id" value="<?=$rs['id']?>"/>   
		名   称：<INPUT TYPE="text" NAME="name" value="<?=$rs['name']?>"/><br />  
		价   格：<INPUT type ="text" name="price" value="<?=$rs['price']?>"/><br />
		库   存：<INPUT type ="text" name="count" value="<?=$rs['count']?>"<br/> 
		<input type="submit" name="submit" value="修改"/> 
		<input type="hidden" name="token" value="update">
	</FORM> 
<?php 
	}
?>
<?php 
 if(isset($_POST['token']) && $_POST['token']=='update'){
    include '../php/conn.php';
	$sql="update shangpin set name='$_POST[name]',price='$_POST[price]',count='$_POST[count]' where id='$_POST[id]'";
	$result =  $mysqli->query($sql); 			
	if($result && $mysqli->affected_rows>0){  
		echo "更新成功";
	}else{ 
		echo "更新失败<br>";
	}
	$mysqli->close(); 
				
	$url = "后台商品显示.php";
	echo "<script language='javascript' type='text/javascript'>"; 
	echo "window.location.href= '$url'";  
	echo "</script>"; 	
}		
?>


