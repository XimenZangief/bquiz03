<?php include_once "../base.php";
    // 表單來源back/order.php L76~94
    $Ord->del([$_POST['type']=>$_POST['target']]);
?>