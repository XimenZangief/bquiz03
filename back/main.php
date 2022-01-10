<?php

if(!empty($_POST)){
    if($_POST['acc']=='admin' && $_POST['pwd']=='1234'){
        // 因為題目沒特別要求要註冊，所以直接寫死
        $_SESSION['login']='admin';
    }else{
        echo "<div class='ct' style='color:red'>帳號或密碼錯誤</div>";
    }
}

if (isset($_SESSION['login'])) {
?>
    <div class="ct a rb" style="position:relative; width:101.5%; left:-1%; padding:3px; top:-9px;">
        <a href="?back.php&do=title">網站標題管理</a>|
        <a href="?back.php&do=go">動態文字管理</a>|
        <a href="?back.php&do=poster">預告片海報管理</a>|
        <a href="?back.php&do=movie">院線片管理</a>|
        <a href="?back.php&do=order">電影訂票管理</a>
    </div>

    <?php

      // 要記得我這邊是back唷>_^
      $do = $_GET['do'] ?? 'main';
      if($do!='main'){
          $file = 'back/' . $do . '.php';
      }else{
          $file=';'
      }
      if (file_exists($file)) {
        include $file;
      } else {
        echo "<div class='rb tab'>";
        echo "<h2 class='ct'>請選擇所需功能</h2>";
        echo "</div>";
      }
      ?>
<?php
} else {
?>
<form action="back.php" method="post">
    <table class="tab">
        <tr>
            <td>帳號</td>
            <td><input type="text" name="acc"></td>
        </tr>
        <tr>
            <td>密碼</td>
            <td><input type="password" name="pwd"></td>
        </tr>
        <tr>
            <td><input type="submit" value="確定登入"></td>
            <td></td>
        </tr>
    </table>
</form>

<?php } ?>