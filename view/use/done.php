


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../component/head.php');  ?>
</head>
<body>
<?php
include ('../../component/nav.php')
?>
<div class="main">
    <div class="left">
        <?php
        $mail=htmlentities($_POST['mail']);
        $name=htmlentities($_POST['name']);
        $passwd=htmlentities($_POST['passwd']);
        $stmt=$pdo->prepare("insert into students (name,mail,passwd) values (:name,:mail,:passwd)");
        $params=array(
            ':name'=>$name,
            ':mail'=>$mail,
            ':passwd'=>$passwd
        );
        $stmt->execute($params);

        $subject="ちょいふっと 生徒登録完了";
        $content="
(このメールはシステムからの自動送信です。)

$name 様

「ちょいふっと」への生徒アカウントでの登録が完了致しました。



【ログインはこちら】
https://choi-foot.com/view/login

【ご不明な点はこちらよりお問い合わせください】
https://choi-foot.com/view/contact

";
        $headers="";
        $to=$mail;
        mb_send_mail($to,$subject,$content,$headers);

        session_destroy();
        ?>
        <div class='regi-done-parent'>
            <h1>生徒登録完了</h1>
            <p>生徒登録が完了しました。</p>
            <a href="../login/index.php">ログイン</a>
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
