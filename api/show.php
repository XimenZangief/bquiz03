<?php include_once "../base.php";

$movie=$Movie->find($_POST['id']);

// 原生
// if($movie['sh']==1){
//     $movie['sh']=0;
// }else{
//     $movie['sh']=1;
// }
// 三元運算
// $movie['sh']=($movie['sh']==1)?0:1;
// 餘數循環應用
$movie['sh']=($movie['sh']+1)%2;
$Movie->save($movie);
?>