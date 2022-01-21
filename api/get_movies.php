<?php 
include_once "../base.php";
$id=$_GET['id'];
$today=date("Y-m-d");
$ondate=date("Y-m-d",strtotime("-2 days"));

$rows=$Movie->all(" where `sh`=1 && `ondate` BETWEEN '$ondate' AND '$today'");
foreach($rows as $row){
    $selected = ($row['id']==$id)?"selected":"";
    echo "<option value='{$row['id']}'>{$row['name']}</option>";
}