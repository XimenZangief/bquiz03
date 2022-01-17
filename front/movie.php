<style>
    .movie-list *{
    box-sizing:border-box;
}

.movie-list{
    display:flex;
    flex-wrap:wrap;
}
.movie-list > div{
    width:49%;
    margin:0.5%;
    border:1px solid white;
}
</style>

<div class="half">
    <h1>院線片清單</h1>
    <div class="rb tab" style="width:95%;">
        <div class="movie-list">
        <?php
        // 給定當日、放映到期日變數
        $today=date("Y-m-d");
        $ondate=date("Y-m-d",strtotime("-2 days"));
        // 分頁
        $all=$Movie->math('count',
                          '*',
                          " WHERE `sh`=1 AND
                                  `ondate` BETWEEN '$ondate' and '$today'");
        $div=4;
        $pages=ceil($all/$div);
        $now=$_GET['p']??1;
        $start=($now-1)*$div;
        // SQL語法BETWEEN: 撈出 A and B之間的資料
        $rows=$Movie->all(" WHERE `sh`=1 AND
                            `ondate` BETWEEN '$ondate' and '$today'
                            ORDER BY `rank`
                            limit $start,$div");
        foreach($rows as $key => $row){
        ?>
        <div>
            <div>片名：<?= $row['name'];?> </div>
            <!-- 需要同列 -->
            <div style="display:flex">
                <div>
                    <img src="..icon/<?=$row['level'];?>.png">
                </div>
                <div>
                    <div>分級：</div>
                    <div>上映日期:<?= $row['ondate'];?></div>
                </div>
            </div>
            <div>
                <button>電影簡介:<?= $row['intro'];?></button>
                <button>線上訂票</button>
            </div>
        </div>
        <?php } ?> 
        </div>
    </div>
            
    <div class="ct">
        <?php
        if(($now-1)>0){
            $pre=$now-1;
            echo "<a href='index.php?p=$i' style='font-size:$pre;'><";
            echo $i. "</a>";
        }else{
            for($i=1;$i<=$pages;$i++){
            $size=($now==$i)?"24px":"16px";
            echo "<a href='index.php?p=$i' style='font-size:$size;'";
            echo "<"."</a>";
            }
        }
        if(($now+1)<=$pages){
            $next=$now+1;
            echo "<a href='index.php?p=$i' style='font-size:$$next;'>";
            echo ">"."</a>";
        }
        ?>
    </div>
</div>
</div>