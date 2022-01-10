<div>
    <form action="api/edit_poster.php" method="post">
        <?php
        $rows=$Poster->all(" ORDER by `rank`");
        foreach($rows as $row){
        ?>

    <div style="display:flex;" class="ct">
        <div style="width: 25%;">
        <img src="img/<?=$row['path'];?>" style="width: 60%;">
        </div>
    </div>

        <?php
        
        ?>
    </form>

</div>
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