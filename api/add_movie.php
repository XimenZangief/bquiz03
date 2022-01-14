<?php include "../base.php";

if(isset($_FILES['trailer']['tmp_name'])){
    $_POST['trailer']=$_FILES['trailer']['name'];
    move_uploaded_file($_FILES['trailer']['name'],"../img/".$_FILES['trailer']['name']);
}
if(isset($_FILES['poster']['tmp_name'])){
    $_POST['poster']=$_FILES['poster']['name'];
    move_uploaded_file($_FILES['poster']['name'],"../img/".$_FILES['poster']['name']);
}

// 傳入的$_POST可以直接被修改
// 原生
// $_POST['ondate']=$_POST['year']."-".$_POST['month']."-".$_POST['day'];
// join或是implode函式
$_POST['ondate']=join("-",$_POST['year'],$_POST['month'],$_POST['day']);
$_POST['rank']=$Movie->math('max','id');
$_POST['sh']=1;

// 因為多的欄位會導致資料庫寫入失敗，所以unset刪除多餘欄位
unset($_POST['year']);
unset($_POST['month']);
unset($_POST['day']);

dd($_POST);
$Movie->save($_POST);

to("../back.php?do=movie");
?>