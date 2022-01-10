<div>
    <h4 class="ct">預告片清單</h4>
    <div style="display:flex" class="ct">
        <div style="width:25%;background:#eee">預告片海報</div>
        <div style="width:25%;background:#eee">預告片片名</div>
        <div style="width:25%;background:#eee">預告片排序</div>
        <div style="width:25%;background:#eee">操作</div>
    </div>

    <form action="api/edit_poster.php" method="post">
        <!-- 避免資料過多造成爆版使用overflow處理 -->
        <div style="overflow:auto" class='ct'>
            <?php
            $rows = $Poster->all(" ORDER by `rank`");
            foreach ($rows as $row) {
            ?>

                <div style="display:flex;" class="ct">
                    <div style="width: 25%;">
                        <img src="img/<?=$row['path'];?>" style="width:60px;">
                    </div>
                    <div style="width: 25%;">
                        <input type="text" name="name[]" value="<?=$row['name'];?>">
                    </div>
                    <div style="width: 25%;">
                        <?= $row['rank']; ?>
                    </div>
                    <div style="width: 25%;">
                        <input type="checkbox" name="sh[]" value="">顯示
                        <input type="checkbox" name="del[]" value="">刪除
                        <select name="ani[]">
                            <option value="1">淡入淡出</option>
                            <option value="2">縮放</option>
                            <option value="3">滑入滑出</option>
                        </select>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
</div>
<div class="ct">
    <input type="submit" value="確定修改">
    <input type="reset" value="重置">
</div>
</form>

<div>
    <h4 class="ct">新增預告片海報</h4>
    <form action="api/add_poster.php" method="POST" enctype="multipart/form-data">
        <div class="ct">
            <label>
                預告片海報:
                <input type="file" name="path">
            </label>
            <label>
                預告片片名:
                <input type="text" name="name">
            </label>
        </div>
        <div class="ct">
            <input type="submit" value="新增">
            <input type="reset" value="重置">
        </div>
    </form>
</div>

<!-- 
偷吃步的SQL指令，直接貼近PMA
INSERT INTO `poster` (`id`, `path`, `name`, `rank`, `sh`, `ani`) VALUES (NULL, '03A01.jpg', '03A01', '1', '1', '1');
INSERT INTO `poster` (`id`, `path`, `name`, `rank`, `sh`, `ani`) VALUES (NULL, '03A02.jpg', '03A02', '2', '1', '1');
INSERT INTO `poster` (`id`, `path`, `name`, `rank`, `sh`, `ani`) VALUES (NULL, '03A03.jpg', '03A03', '3', '1', '1');
INSERT INTO `poster` (`id`, `path`, `name`, `rank`, `sh`, `ani`) VALUES (NULL, '03A04.jpg', '03A04', '4', '1', '1');
INSERT INTO `poster` (`id`, `path`, `name`, `rank`, `sh`, `ani`) VALUES (NULL, '03A05.jpg', '03A05', '5', '1', '1');
INSERT INTO `poster` (`id`, `path`, `name`, `rank`, `sh`, `ani`) VALUES (NULL, '03A06.jpg', '03A06', '6', '1', '1');
INSERT INTO `poster` (`id`, `path`, `name`, `rank`, `sh`, `ani`) VALUES (NULL, '03A07.jpg', '03A07', '7', '1', '1');
INSERT INTO `poster` (`id`, `path`, `name`, `rank`, `sh`, `ani`) VALUES (NULL, '03A08.jpg', '03A08', '8', '1', '1');
INSERT INTO `poster` (`id`, `path`, `name`, `rank`, `sh`, `ani`) VALUES (NULL, '03A09.jpg', '03A09', '9', '1', '1');
-->
