<?php include_once "../base.php";
$movie=$Movie->find($_POST['id']);
$date=$_POST['date'];
$session=$ss[$_POST['session']];

// 因為sort不會回傳陣列，故先sort後再填入seats
sort($_POST['seat']);
$seats=$_POST['seats'];
$id=$Ord->math("max","id")+1;

// sprintf字串印出格式
$no=date("Ymd"). sprintf("%04d",$id);

$Ord->save([
    'no'=>$no,
    'movie'=>$movie['name'],
    'date'=>$date,
    'session'=>$session,
    // serialize陣列轉字串
    'seat'=>serialize($seats),
    'qt'=>count($seats)
]);
?>
<style>
    #order{
        width:60%;
        margin:auto;
    }
    .row{
        display:flex;
        width:100%;
    }
    .row .first{
        width:20%;
        text-align:right;
    }
    .row .sec{
        width:85%;
        text-align:left;
    }
    .sec select{
        width:100%;
    }

</style>
