$(function(){
	var num=1;//当前页数
var pageCount=3;//每页显示的数量
var pageNum=0;//总页数
	function ajaxDate(num){
		$.ajax({
			url: 'http://localhost/项目-海淘网/php/shangpinList.php',
			type: 'get',
			dataType: 'json',
			data: {
				num: num,pageCount:pageCount//传递的参数
			},
			success:function(res){
				pageNum=Math.ceil(res.count/pageCount);//请求的总页数
				res.list.forEach(function(data){
					var str="<div class=\"col-md-4 col-xs-6 \"  style=\"margin-top: 50px;\">"+
							"<a style=\"text-decoration: none;\" href=\"\">"+
							
							"<img style=\"width: 100%; hegiht:100%;\" src=\""+data.img+"\">"+
							
							 "<p style=\" color:#222\">"+data.name+"</p>"+
							 "<p style=\"text-align: center; color:red\">￥"+data.price+"</p>"+
							"</a>"+"</div>";
							
							
										
								
					
					$("#information #row").append(str);//将字符串追加到指定的位置
				})
			}
		})
	}
	ajaxDate(num);

	$(window).scroll(function(){
		var sTop=$(this).scrollTop();//获取滚动条卷进去的距离，用jquery
		var sHeight=$(this).height();//获取可视区域的高度，用jquery
		var bodyH=$(document).height();//获取页面所有内容的高度，用jquery
		if(sTop+sHeight>bodyH-1){//请写出判断条件
		num++;
		if(num<=pageNum){//请写出判断条件
		console.log(num);
		ajaxDate(num);//调用函数请求加载数据
		}
		}
})
		
		
})

// query获取窗口高度和窗口高度，$(document).height()、$(window).height()

// $(document).height()：整个网页的文档高度
// $(window).height()：浏览器可视窗口的高度
// $(window).scrollTop()：浏览器可视窗口顶端距离网页顶端的高度（垂直偏移）
// $(document.body).height();//浏览器当前窗口文档body的高度
// $(document.body).outerHeight(true);//浏览器当前窗口文档body的总高度 包括border padding margin
// $(window).width(); //浏览器当前窗口可视区域宽度
// $(document).width();//浏览器当前窗口文档对象宽度
// $(document.body).width();//浏览器当前窗口文档body的高度
// $(document.body).outerWidth(true);//浏览器当前窗口文档body的总宽度 包括border padding margin