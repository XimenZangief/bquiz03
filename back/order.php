<style>
    .field,
    .row {
        display: flex;
    }

    .field span,
    .row span {
        /* flex:數字，該標籤扣掉行內其他元素後佔的比例 */
        flex: 1;
        background: #eee;
        margin: 0 1px;
        text-align: center;
    }

    .row span {
        background: white;
    }

    .list {
        height: 400px;
        overflow: auto;
    }
</style>

<h3 class="ct">訂單清單</h3>
<div>
    快速刪除：
    <!-- radio的name相同才會是單選，否則多選 -->
    <input type="radio" name="type" value="date">
    依日期
    <input type="text" name="date" id="date">
    <input type="radio" name="type" value="movie">
    依電影
    <select name="movie" id="movie"></select>
    <button onclick="qdel()">刪除</button>
</div>
<div class="field">
    <span>訂單編號</span>
    <span>電影名稱</span>
    <span>日期</span>
    <span>場次時間</span>
    <span>訂購數量</span>
    <span>訂購位置</span>
    <span>刪除</span>
</div>
<div class="list">
    <?php
    $rows = $Ord->all(" ORDER BY `no` DESC");
    foreach ($rows as $row) {
        echo "<div class='row'>";
        echo "<span>{$row['no']}</span>";
        echo "<span>{$row['movie']}</span>";
        echo "<span>{$row['date']}</span>";
        echo "<span>{$row['session']}</span>";
        echo "<span>{$row['qt']}</span>";
        echo "<span>";
        // copy from api/order.php L81
        foreach ($seats as $seat) {
            echo (floor($seat / 5) + 1) . "排" . ($seat % 5 + 1) . "號<br>";
        }
        echo "</span>";
        // &#39; 單引號代碼
        // echo "<span><button onclick='del('ord',{$row['id']})'>刪除</button></span>";
        echo "<span><button onclick='del(&#39;ord&#39;,{$row['id']})'>刪除</button></span>";
        echo "</div>";
        echo "<hr>";
    }
    ?>
</div>

<script>
    // copy from front/order.php L102-104簡化後
    $("#movie").load("api/get_ordmovies.php");

    function qdel() {
        // 讀取<input name='type' checked>物件的值
        let type=$("input[name='type']:checked").val();
        let target;
        switch (type) {
            case 'date':
                target=$("#date").val();
                break;
            case 'movie':
                target=$("#movie").val();
                break;
        }
        let chk=confirm(`您確定要刪除${target}的所有訂單資料嗎?`);
        if(chk){
            $.post("api/qdel.php",{type,target},()=>{
                location.reload();
            })
        }
    }
</script>