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
include ('../../component/nav.php');
session_start();
$mail=$_SESSION['mail'];
?>
<div class="main">
    <div class="left">
        <div class='contact-parent'>
            <div>
                <h3>お問い合わせ</h3>
                <p class="font15px contact-message">わからないことなどがあればこちらのフォームよりご連絡ください。なお迷惑行為が認められた場合はご利用を停止させていただくことがごさいます。</p>
            </div>
            <form class="form" action="done.php" method="post">
                <?php
                if($_SESSION['mail']==true){
                    echo ("<input type='hidden' name='mail' value='$mail'>");
                }
                else{
                    echo ("<input type='mail' name='mail' placeholder='メールアドレス（必須）' maxlength='50' class='contact-mail' required><br><br>");
                }
                ?>
                <textarea class="contact-txt" name="content" id="content" required></textarea><br>
                <input class="form-btn" type="submit" value="送信">
            </form>
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
