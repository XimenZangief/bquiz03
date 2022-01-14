<button onclick="location.href='?do=add_movie'">新增電影</button>
<hr>
<div style="overflow:auto; height:420px;">
    <?php
    $movies = $Movie->all(" ORDER by rank");
    // dd($movie);
    foreach ($movies as $key => $movie) {
    ?>
        <div style="display:flex; width:100%">
            <div style="width:10%">
                <img src="img/<?= $movie['poster']; ?>" style="width:100%">
            </div>
            <div style="width:10%">
                分級
                <img src="icon/<?= $movie['level']; ?>.png">
            </div>
            <div style="width:80%">
                <div style="display:flex">
                    <div style="width:33%">片名:<?= $movie['name']; ?></div>
                    <div style="width:33%">片長:<?= $movie['length']; ?></div>
                    <div style="width:33%">上映時間:<?= $movie['ondate']; ?></div>
                </div>
                <div style="text-align:right">
                    <button class="show" data-id="<?= $movie['id']; ?>">
                        <?= ($movie['sh'] == 1) ? "顯示" : "隱藏"; ?>
                    </button>

                    <?php
                    // 上移/下移功能
                    if ($key == 0) {
                        $up = $movie['id'] . "-" . $movie['id'];
                        // 直接取得rows索引值
                        $down = $movie['id'] . "-" . $movies[$key + 1]['id'];
                    }
                    if ($key == (count($movies) - 1)) {
                        $down = $movie['id'] . "-" . $movie['id'];
                        $up = $movie['id'] . "-" . $movies[$key - 1]['id'];
                    }
                    if ($key > 0 && $key < (count($movies) - 1)) {
                        $up = $movie['id'] . "-" . $movies[$key - 1]['id'];
                        $down = $movie['id'] . "-" . $movies[$key + 1]['id'];
                    }
                    ?>

                    <button type="button" class="sw" data-sw="<?= $up; ?>">往上</button>
                    <button type="button" class="sw" data-sw="<?= $down; ?>">往下</button>
                    <button onclick="location.href='?do=edit_movie&id=<?= $movie['id']; ?>>'">編輯電影</button>
                    <button onclick="del('movie',<?= $movie['id']; ?>)">刪除電影</button>
                </div>
                <div>劇情介紹:<?= $movie['intro']; ?></div>
            </div>
        </div>
        <hr>
    <?php } ?>
</div>

<script>
    $(".show").on("click", function() {
        let id = $(this).data("id");
        $.post("api/show.php", {
            id
        }, () => {
            location.reload();
        })
    })
    // 如果你喜歡箭頭函式...
    // $(".show").on("click",(e)=>{
    //     let id= $(e.target).data("id");
    //     $.post("api/show.php",{id},()=>{
    //         location.reload();
    //     })
    // })
    // 如果你真的吃飽很閒...就用$(e.target)=$(this)炫砲
    // $(".show").on("click",function(e){
    //     let id= $(e.target).data("id");
    //     $.post("api/show.php",{id},()=>{
    //         location.reload();
    //     })
    // })
    $('.sw').on('click', function() {
        // split("-")分割字串並用 - 連結成陣列
        let id = $(this).data('sw').split("-");
        $.post("api/sw.php", {
            id,
            table: "movie"
        }, () => {
            location.reload();
        })
        console.log(id);
    })
</script>