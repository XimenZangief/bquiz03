<?php include_once "../base.php";

$db=new DB($_POST['table']);

// 給予進入的data索引
$id0=$_POST['id'][0];
$id1=$_POST['id'][1];

// 撈出資料
$row0=$db->find($id0);
$row1=$db->find($id1);

// 交換
$tmp=$row0['rank'];
$row0['rank']=$raw1['rank'];
$row1['rank']=$tmp;

// 兩筆資料都有變動，都必須save
$db->save($row0);
$db->save($row1);

?>