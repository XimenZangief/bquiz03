<?php 
include_once "../base.php";
$movie=$Movie->find($_GET['id']);
$date=$_GET['date'];
// date("G")24HR格式，沒有前導零 0~23
if($date!=date("Y-m-d") || date("G")<14){
    $s=5;
}else{
    $s=5-ceil((date("G")-13)/2);
}

for($i=(6-$s);$i<=5;$i++){
    $seats=$Ord->math('sum','qt',['movie'=>$movie['name'],'date'=>$date,'session'=>$ss[$i]]);
    echo "<option value='$i'>{$ss[$i]} 剩餘座位".(20-$seats)." </option>";
} 