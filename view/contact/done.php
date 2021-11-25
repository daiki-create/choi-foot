

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../component/head.php');  ?>
    <link rel="stylesheet" href="../../css/layout.css">
    <link rel="stylesheet" href="../../css/540.css" media="screen and (max-width:540px)">
    <link rel="stylesheet" href="../../css/320.css" media="screen and (max-width:320px)">
</head>
<body>
<?php
include ('../../component/nav.php')
?>
<div class="main">
    <div class="left">
        <?php
        $subject=htmlentities($_POST['mail']);
        $content=htmlentities($_POST['content']);
        $headers="";
        $to="6280ikiad@gmail.com";
        mb_send_mail($to,$subject,$content,$headers);
        ?>
        <div class='contact-done-parent'>
            <h3>送信完了</h3>
            <p class='ws-nomal'>お問い合わせを送信しました。
                <br>返信に少々お時間をいただくことがございます。</p>
        </div>
    </div>
    <div class="right">
        <?php include('../../component/pr.php');  ?>
    </div>
</div>
<?php
include ('../../component/footer.php');
include ('../../component/nav2.php');?>
</body>
</html>