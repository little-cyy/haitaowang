<?php
include '../php/conn.php';		
if(isset($_POST['token']) && $_POST['token']=='upload'){
	//判断文件是否合法上传
	if($_FILES['uploadFile']['error']!=0){
		echo "<h2>上传文件发生了错误！</h2>";
		die();
	}
	//判断上传文件是否为图像
	$arr=array('image/jpeg','image/png','image/gif');
	$type=$_FILES['uploadFile']['type'];
	if(!in_array($type,$arr)){
		echo "<h2>必须上传图像！</h2>";
		die();
	}
	//移动图片到./upload目录中
	$ext = pathinfo($_FILES['uploadFile']['name'] ,PATHINFO_EXTENSION);
	$tmp_name = $_FILES['uploadFile']['tmp_name'];
	$dst_name ="../upload/". uniqid().".".$ext;
	move_uploaded_file($tmp_name ,$dst_name );
	

	
	$name=$_POST['name'];
	$img= substr($dst_name,1);
	$count=$_POST['count'];
	$price=$_POST['price'];
	$sql="insert into shangpin (name,img,count,price) value ('$name','$img','$count','$price')";
	$result =$mysqli->query($sql);
}
$mysqli->close();
?>


<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>后台商品管理</title>
	<style>
		.add{
			width: 1000px;
			text-align: center;
		}
		 table tr td {
			text-align: center;
			font-size: 22px;
			
		 }
		 table tr td input{
		
			 height: 22px;
	</style>
</head>
<body>
	<div class="add">
		<form action="添加商品.php" enctype="multipart/form-data" method="post">
			<table style="margin: auto;">
				<tr><td>
					<input type="file" name="uploadFile" >
				</td></tr>
				<tr><td>
					商品名称：<input type="text" name="name" >
				</td></tr>
				<tr><td>
					商品库存：<input type="text" name="count" >
				</td></tr>
				<tr><td>
					商品价格：<input type="text" name="price" >
				</td></tr>
				<tr style="text-align: center;"><td>
					<input type="submit" value="提交">
					<input type="hidden" name="token" value="upload">
				</td></tr>
			</table>
		</form>
		<a style="text-decoration: none;" href="后台商品显示.php">查看所有商品</a>
	</div>	
</body>
</html>