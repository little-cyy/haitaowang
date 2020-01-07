<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>请登录</title>
	<!-- <link rel="stylesheet" type="text/css" href="./css/base.css"/> -->
	<style>
		.buju{
			margin: auto;
			width:800px;
			height:550px;
			background-color: lightpink;
			align-items: center;
			position: relative;
		}
		.centent{
			background-color: mistyrose;
			width: 400px;
			height: 360px;
			text-align: center;
			position: absolute;
			top:100px;
			left: 200px;
		
		}
		.buju table{
			
			margin-top:50px;
	
		}
		.buju table td input{
			width: 300px;
			height: 40px;
			
		}
	#denglu{
		margin-top: 30px;
		width: 80px;
		height: 30px;
	}	
	a{
		float: right;
		font-size: 12px;
		text-decoration: none;
		color: #999;
	}	
	a:hover {
	   color:#999; 
	}
	
	</style>
</head>
<body>
	<div class="buju">
		<div class="centent">
			<p><?php
			session_start();
			include './php/conn.php'; 
			if (@$_POST['username']){
				if($_POST['password']){
					if($_POST['capchar']){
						$username=$_POST['username'];
						$password=$_POST['password'];
						$capchar=$_POST['capchar'];
						if($capchar==$_SESSION['capchar']){
							$sql="select * from user where username= '$username' and password='$password'";
							$result = $mysqli->query($sql);
							if($result && $result->num_rows>0){
								setcookie ('username',$username,0);
								header ("location:首页.php");
							}else{
								echo "用户名密码输入有误!";				
							}
							$result->free_result();
							$mysqli->close();
						}else{
							echo "验证码输入有误!";
						}   
					}else{
						echo "请输入验证码!";  
					}
				}else{
					echo "请输入密码!";  
				}
			}else{
				 echo "请输入用户名!";  
			}
			?></p>
			<form action="登录.php" method="post" >        
				<table>
					<tr>
						<td><input type="text" placeholder="&nbsp;&nbsp;请输入用户名" name="username"></td>
					</tr>
					
					<tr>
						<td><input type="password" placeholder="&nbsp;&nbsp;请输入密码" name="password"></td>
					</tr>
					<tr>
						<td>
							<input type="text"  placeholder="&nbsp;&nbsp;请输入图中验证码" name="capchar">
							<img src="./php/captcha.php " alt="" style="margin-top: 10px;" id="yanzhengma" />
							<script>
								var verifyImage = document.getElementById('yanzhengma');
								verifyImage.onclick = function () {
									this.src = './php/captcha.php?r=' + Math.random() ;
								}
							</script>
						</td>
					</tr>
				</table>
				
				<input type="submit" value="登录"  id="denglu">    
			</form>
			<a  href="注册.php">&nbsp;注册</a>
			<a  href="首页.php">首页&nbsp;</a>
			
		</div>
		
	</div>
	
</body>
</html>


