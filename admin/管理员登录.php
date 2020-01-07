<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title></title>
	<style>
		.buju{
			margin: auto;
			width:800px;
			height:550px;
			align-items: center;
			position: relative;
		}
		.centent{
			background-color: #C6C8CA;
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
			include '../php/conn.php'; 
			if (@$_POST['ausername']){
				if($_POST['apassword']){
					if($_POST['capchar']){
						$ausername=$_POST['ausername'];
						$apassword=$_POST['apassword'];
						$capchar=$_POST['capchar'];
						if($capchar==$_SESSION['capchar']){
							$sql="select * from admin where ausername= '$ausername' and apassword='$apassword'";
							$result = $mysqli->query($sql);
							if($result && $result->num_rows>0){
								setcookie ('ausername',$ausername,0);
								header ("location:后台商品显示.php");
							}else{
								echo "账号密码输入有误!";				
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
				 echo "请输入管理员账号!";  
			}?></p>
			<form action="管理员登录.php" method="post" >        
				<table>
					<tr>
						<td><input type="text" placeholder="&nbsp;&nbsp;请输入管理员账号" name="ausername"></td>
					</tr>
					
					<tr>
						<td><input type="password" placeholder="&nbsp;&nbsp;请输入密码" name="apassword"></td>
					</tr>
					<tr>
						<td>
							<input type="text"  placeholder="&nbsp;&nbsp;请输入图中验证码" name="capchar">
							<img src="../php/captcha.php " alt="" style="margin-top: 10px;" id="yanzhengma" />
							<script>
								var verifyImage = document.getElementById('yanzhengma');
								verifyImage.onclick = function () {
									this.src = '../php/captcha.php?r=' + Math.random() ;
								}
							</script>
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" value="登录"  id="denglu">    
					   </td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</body>
</html>