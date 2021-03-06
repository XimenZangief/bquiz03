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
<div id="order">
    <div class="row">
        <div class="sec">
            感謝您的訂購，您的訂單編號是：<?=$no;?>
        </div>
    </div>
    <div class="row">
        <div class="first">
            電影名稱：
        </div>
        <div class="sec">
            <?=$movie['name'];?>
        </div>
    </div>
    <div class="row">
        <div class="first">
            日期：
        </div>
        <div class="sec">
            <?=$date;?>
        </div>
    </div>
    <div class="row">
        <div class="first">
            場次時間：
        </div>
        <div class="sec">
            <?=$session;?>
        </div>
    </div>
    <div class="row">
        <div class="sec">
            座位：<br>
            <?php
            foreach ($seats as $seat) {
                echo (floor($seat/5)+1). "排". ($seat%5+1)."號<br>";
            }
            ?>
            共<?=count($seats);?>張電影票
        </div>
    </div>
    <div class="row">
        <div class="ct" style="width:100%;">
        <button onclick="locatiom.href='index.php'">確認</button>
    </div>
    </div>
</div>