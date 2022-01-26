<?php
// 取得已經有訂票的電影資料
// copy from api/get_movies.php
include_once "../base.php";
// 尋找ord資料表內的movie欄位並根據movie欄位排序
$rows=$Movie->q("SELECT `movie` FROM `ord` GROUP BY `movie`");
foreach($rows as $row){
    echo "<option value='{$row['movie']}'>{$row['movie']}</option>";
}