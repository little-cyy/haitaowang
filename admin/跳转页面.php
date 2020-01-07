<?php
    //开启session
  session_start(); 
  setcookie(session_name(),'',time()-1);
  $_SESSION = array();
  
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>登陆系统</title>
<link  href="css/mycss.css" type="text/css" rel="stylesheet"/>
</head>
<body>	

	<H3 style="COLOR: #880000">提示信息</H3>
	<H4>您还没有登陆<br />系统将在
	<input type="text" style='font-size:18px; border:0px; width:20px;' 
		readonly="true" value="5" id="time">秒后返回登录界面
	</H4>

<!-- 时间函数 -->
<script language="javascript">
	var t = 5;
	var time = document.getElementById("time");
	function fun()
	{
		t--;
		time.value = t;
		if(t<=0)
		{
			location.href="管理员登录.php";
			clearInterval(inter);
		}
	}
	var inter = setInterval("fun()",1000);
</script>
</body>
</html>

