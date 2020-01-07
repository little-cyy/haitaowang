<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>注册</title>
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
		margin-left: 45px;
		margin-top:50px;
	}
	.buju table td input{
		width: 300px;
		height: 40px;		
	}
	#zhuce{
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
					if ($_POST['name']){
					if($_POST['password']){
						if($_POST['passwordOk']){
							$username=$_POST['username'];
							$name=$_POST['name'];
							$password=$_POST['password'];
							$passwordOk=$_POST['passwordOk'];
							
							// 判断用户是否已经存在
							$sqlUsername="select username from user where username='$username'";
							$resultUsername = $mysqli->query( $sqlUsername);
							
							if($resultUsername && $result->num_rows>0){
								echo "用户名已存在!";  
							}else{
								if ($password==$passwordOk){
									$sql="insert into user(username,name,password) values('$username','$name','$password')";
								$result = $mysqli->query( $sql);
									if($result){
										echo '<script language="JavaScript">;alert("注册成功");location.href="登录.php";</script>;';
									}else{
										echo "注册不成功!"; 
									}
								}else{
									echo "两次密码输入不一致!"; 
								}
							}
							//关闭数据库
							$mysqli->close(  
						}else{
							echo "请再次输入密码!";  
						}
					}else{
						echo "请输入密码!";  
					}
				}else{
					echo "请输入真实姓名!";  
				}
			}else{
				echo "请输入用户名!";  
			}?></p>
			<form action="注册.php" method="post" >        
				<table>
					<tr>
						<td>
							<input type="text" placeholder="&nbsp;&nbsp;请输入用户名" name="username">
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" placeholder="&nbsp;&nbsp;请输入您的真实姓名" name="name">						  </td>
					</tr>
					<tr>
						<td>
							<input type="password" placeholder="&nbsp;&nbsp;请输入密码" name="password">
						</td>
					</tr>
					<tr>
						<td>
							<input type="password" placeholder="&nbsp;&nbsp;请再次输入密码" name="passwordOk">
						</td>
					</tr>
						
				</table>
					
				<input type="submit" value="注册"  id="zhuce">    
			</form>
				<a  href="登录.php">&nbsp;登录</a>
				<a  href="首页.php">首页&nbsp;</a>
		</div>
			
	</div>
		
</body>
</html>