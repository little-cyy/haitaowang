<?php
 session_start(); 
 if ( !$_COOKIE['ausername'] ) {
     header("Location: 跳转页面.php");
     exit;
 }
include '../php/conn.php';	
$sql='select * from shangpin';
$s=$mysqli->query($sql);
?>
<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title></title>
	<style>
		table{
			width: 100%;
			border:1px solid #222;
		}
		table tr th, table tr td {
			border-right:1px solid #222;
			border-bottom:1px solid #222;
			text-align: center;
			font-size: 18px;
			
		 }
	</style>
</head>
<body>
	<table style="margin: auto;">
		<tr>
	    	<th>编号</th>
	        <th>商品名称</th>
	        <th>添加日期</th>
			<th>图片</th>
	        <th>库存量</th>
	        <th>价格</th>
			<th colspan="2">操作</th>
	    </tr>
		<?php
		while ($rows=$s->fetch_row()){
		    echo '<tr>';
		    echo '<td>'.$rows[0].'</td>';
		    echo '<td>'.$rows[1].'</td>';
		    echo '<td>'.$rows[2].'</td>';   
		    echo '<td>'.$rows[3]==''?'<td>图片替换</td>':'<td><img style="width: 30%;height: 30%;"  src="../'.$rows[3].'"></td>';
			echo '<td>'.$rows[4].'</td>';
		    echo '<td>'.$rows[5].'</td>';
			echo '<td>
						<a style="text-decoration: none;" href="修改商品.php?id='.$rows[0].'">
							<input style="width: 100px;height: 50px;" type="button" value="修改"></input>
					    </a>
							
						<input style="width: 100px;height: 50px;" type="button" value="删除" onclick="cli(this)" id='.$rows[0].'></input>
						
				   </td>';
				
		    echo '<td>
			            <a style="text-decoration: none;" href="添加商品.php">
					  		 <input style="width: 100px;height: 50px;" type="button" value="添加"></input>
					   </a>
				 </td>';
		    echo '</tr>';
		}
		?>
	</table>
	</body>
	<script type="text/javascript">
	        function cli(o){
	            //confirm方法弹出一个对话框,可以选择确定与取消操作
	            //同时该方法有返回值,true和false,两个布尔值
	            var flag = confirm("确定删除吗?");
				if (flag){
				var path="删除商品.php?id="+o.id;
				window.location.href=path;
				}
			}
	    </script>
	</html>

