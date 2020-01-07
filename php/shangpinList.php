<?php
include './conn.php';	
// 求信息总数
$sqlCount="select * from shangpin";# 查询所有数据的sql语句
$resultC = $mysqli->query($sqlCount);# 执行数据库
$count=$resultC->num_rows;
$num=$_GET["num"];
$pageCount=$_GET["pageCount"];
$start=($num-1)*$pageCount;#求开始查询的索引值
// 返回指定数据
$sql = "select * from shangpin limit $start ,$pageCount";#返回指定数据的sql语句
$result = $mysqli->query($sql);
$res = array('count'=>$count);
$jarr=array();
// 遍历数据
while($row =$result->fetch_array(MYSQLI_ASSOC))
  {
    array_push($jarr,$row);
  }
$res = array(
    'count'=>$count,
    'list'=>$jarr
);
echo json_encode($res);
$mysqli->close();
?>