<?
include_once "../base.php";

$movie = $Movie->find($_GET['id']);
$date = $_GET['date'];
$session = $ss[$_GET['session']];

$rows=$Ord->all(['movie'=>$movie['name'],'date'=>$date,'session'=>$session]);
$seats=[];
foreach ($rows as $row) {
    // unserialize()將字串轉換回陣列
    $seats=array_merge($seats,unserialize($row['seat']));
}

?>
<style>
    #seats {
        display: flex;
    flex-wrap: wrap;
    width:540px;
    height:370px;
    padding:19px 112px 12px 112px;
    margin:auto;
    background:url('icon/03D04.png');
    box-sizing:border-box;
    }

    .null {
        background:url('icon/03D02.png');
    background-position:center;
    background-repeat:no-repeat;background: url("icon/03D02.png");
    }

    .booked {
        background:url('icon/03D02.png');
    background-position:center;
    background-repeat:no-repeat;
    }

    .seat {
        width: 63px;
        height: 85px;
        position: relative;
    }

    .check {
        /* 會找到父輩relative屬性的元素做對照 */
        position: absolute;
        right: 5px;
        bottom: 5px;
    }
</style>
<div id="seats">
    <?php
    for ($i = 0; $i < 20; $i++) {
        $booked=in_array($i,$seats)?'booked':'null';
        echo "<div class='seat $booked'>";
        echo "<div class='ct'>";
        echo (floor($i / 5) + 1) . "排" . ($i % 5 + 1) . "號";
        echo "</div>";
        // 沒有被訂走的位置才會顯示checkbox
        if(!in_array($i,$seats)){
            echo "<input type='checkbox' name='check' class='check' value='$i'>";
        }
        echo "</div>";
    }
    ?>
</div>

<div style="width:540px; margin:auto">
    <div>您選擇的電影是:<?= $movie['name']; ?></div>
    <div>您選擇的時刻是:<?= $date; ?> <?= $session; ?></div>
    <div>您已經勾選了<span id="tickets"></span>最多可以購買四張票</div>
    <div>
        <button onclick="prev()">回上一步</button>
        <button onclick="order()">完成訂購</button>
    </div>
</div>

<script>
let seats=new Array();

    // 如果.check被click
    $(".check").on('click',function(){

        // 已是checked狀態時判定seats.length
        // 小於4則push入seats陣列，否則prop, false該次選取
        if($(this).prop('checked')){
            if(seats.length<4){
                seats.push(($this).val());
            }else{
                alert("最多四張票");
                $(this).prop('checked',false);
            }
        }else{
            seats.splice(seats.indexOf($(this.val())),1);
        }
        
        // 動態顯示勾選票數
        $("#tickets").text(seats.length);  
        })


    function order(){
        let order={
            id:$("#movie").val(),
            date:$("#date").val(),
            session:$("#session").val(),
            seats
        }
        $.post('api/order.php',order,(result)=>{
            $("#mm").html(result);
        })
    }
</script>