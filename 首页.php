
<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<!--
	   告诉IE浏览器以最新的 解析器  去解析当前的页面，
	        content="IE=edge"中的edge代表是最新的解析器,也可以说是IE-11。
	        content="IE=10" 代表指定使用IE-10的解析器
	-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>海淘网</title>
	<link rel="stylesheet" type="text/css" href="lib/Bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="lib/css/base.css"/>
	<link rel="stylesheet"type="text/css" href="lib/css/index.css">
</head>
<body>
	<div class="shortcut">
		<div class="w">
			<!-- 左侧 -->
			<div class="shortcut-left fl">
				
				<?php 
						if(@$_COOKIE["username"]){
							?>
							Hi,
							<a href="登录.html"><?php echo $_COOKIE["username"]; ?></a>
							<a href="?action=del">&nbsp;&nbsp;退出</a>
							
							<?php
						}else{
							?>
							您好，欢迎来到海淘网！
							<a href="登录.php">&nbsp;请登录</a>
							<a href="注册.php">&nbsp;注册</a>
						<?php	
						}
						if(@$_GET["action"]=="del"){
							setcookie('username','',0);;
							echo "<script>location.href='登录.php';</script>";
						}
						 ?>
			</div>
			<!-- 右侧 -->
			<div class="shortcut-right fr">
				<ul>
					<li><a href="#">个人中心</a></li>
					<li><a href="#">我的购物车</a></li>
					<li><a href="#">我的收藏夹</a></li>
					<li><a href="#">联系客服</a></li>
					<li><a href="#">网站导航</a></li>
				</ul>      
			</div>
		</div>
	</div>
	
	
	
	<div class=" search w">
	    <!-- 左 -->
	    <div class="search-logo">
	        <a href=""><img src="./images/logo.jpg" alt=""></a>
	    </div>
		
		<div class="search-input ">
			<form class="clearfix" action="" method="">
				<input type="text" placeholder="请输入商品/店铺/关键字"/><button type="submit"><a href="#">搜索</a></button>	
			</form>      
		</div>
		
	</div>
	
	
	<div class="carousel slide w" id="sz-banner"  data-ride="carousel">
	    <!-- ol标签是图片轮播的控制点 -->
	    <ol class="carousel-indicators">
	        <!-- 
			每一个li就是一个单独的控制点,data-target属性就是指定当前控制点控制	
			的是哪一个轮播图，其目的是如果界面上有多个轮播图，便于区分到底控制哪一个data-
			slide-to属性是指当前的li元素绑定的是第几个轮播项, 注意，默认必须给其中某个
			li加上active，展示的时候就是焦点项目
			-->
	        <li data-target="#sz-banner" data-slide-to="0" class="active"></li>
	        <li data-target="#sz-banner" data-slide-to="1"></li>
	        <li data-target="#sz-banner" data-slide-to="2"></li>
	    </ol>
	  
			<!-- 内容 -->
			<!--
			.carousel-inner是所有轮播项的容器盒子，
			注意role="listbox"代表当前div是一个列表盒子，作用就是给当前div添加一个语义
			-->
	    <div class="carousel-inner" role="listbox">
	        <!-- 每一个.item就是单个轮播项目，注意默认要给第一个轮播项目加上active，表示为焦点 -->
	        <div class="item active">
	        <!-- 轮播项目中展示的图片 -->
				<img src="images/img01.jpg" alt="...">
	            <!-- 标题或说明性文字，如果不需要，直接删除当前div.carousel-caption   -->
	            <div class="carousel-caption"></div>
	        </div>
	        <div class="item">
	            <img src="images/img02.png" alt="...">
	            <div class="carousel-caption"></div>
	        </div>
	        <div class="item">
	            <img src="images/img03.png" alt="...">
				<div class="carousel-caption"></div>
	        </div>
	          
	    </div>
		
		
	  
	    <!-- 控制器 上一张 -->
	    <!-- 图片轮播上左右两个控制按钮，分别点击可以滚动到上一张和下一张 -->
	    <!-- 此处需要注意的是 该a链接的href属性必须指向需要控制的轮播图ID -->
	    <!-- 另外a链接中的data-slide="prev"代表点击该链接会滚到上一张，如果设置为next的话则相反 -->
	   <a class="left carousel-control" href="#sz-banner" role="button" data-slide="prev">
	        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	        <span class="sr-only">Previous</span>
	    </a>
	    <!--下一张-->
	   <a class="right carousel-control" href="#sz-banner" role="button" data-slide="next">
	        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	        <span class="sr-only">Next</span>
	    </a> 
		
	</div>
	
	
	
	
	<!-- 商品列表展示 -->
	
	<div id="information">
		<div class="container">
			<div class="row" id="row">
		
			</div>
		</div>
	</div>
	
	
</body>
<script src="lib/jquery/jquery.js"></script>
<script src="lib/Bootstrap/js/bootstrap.js"></script>
<script src="lib/js/index.js"></script>
</html>