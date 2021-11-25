


<meta charset="UTF-8">
<title>ちょいふっと</title>
<link rel="shortcut icon" href="../../img/favicon.ico">
<link rel="stylesheet" href="../../css/module.css">
<link rel="stylesheet" href="../../css/540.css" media="screen and (max-width:540px)">
<script src="../../js/jquery.min.js"></script>

<!--googleフォント-->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

<!--for index-->
<link rel="shortcut icon" href="../img/favicon.ico">
<link rel="stylesheet" href="../css/module.css">
<link rel="stylesheet" href="../css/540.css" media="screen and (max-width:540px)">
<script src="../js/jquery.min.js"></script>

<meta name="viewport" content="width=device-width,shrink-to-fit=yes">
<meta name="description" content="30分単位で好きなサッカーコーチを”ちょい”とだけレンタルできるサービス「ちょいふっと」です。">
<script>
    /* ピッチインピッチアウトによる拡大縮小を禁止 */
    document.documentElement.addEventListener('touchstart', function (e) {
        if (e.touches.length >= 2) {e.preventDefault();}
    }, {passive: false});
    /* ダブルタップによる拡大を禁止 */
    var t = 0;
    document.documentElement.addEventListener('touchend', function (e) {
        var now = new Date().getTime();
        if ((now - t) < 350){
            e.preventDefault();
        }
        t = now;
    }, false);

    
});
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-D1NC7C4GNX"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-D1NC7C4GNX');
</script>

<style>
    body , input , textarea , select {
        /* 入力欄にフォーカスが当たっても拡大しない */
        font-size:17px;
    }
</style>
<?php
try {
    $pdo = new PDO('mysql:host=mysql1024.db.sakura.ne.jp;dbname=whitecattle2_choi-foot;charset=utf8',
        'whitecattle2',
        'Yd10989286',
        [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);
}catch (Exception $e){
    $error="接続に失敗しました";
    header("location:../view/myPage.php?error=$error");
    exit();
}
?>