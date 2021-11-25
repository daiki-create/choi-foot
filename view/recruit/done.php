


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
        $stmt=$pdo->prepare("insert into coaches (name,mail,passwd) values (:name,:mail,:passwd)");
        $params=array(
            ':name'=>$name,
            ':mail'=>$mail,
            ':passwd'=>$passwd
        );
        $stmt->execute($params);

        $subject="ちょいふっと コーチ登録完了";
        $content="
(このメールはシステムからの自動送信です。)

$name 様

この度は「ちょいふっと」にコーチ登録いただきありがとうございます。


外部へコーチを公開するためには審査が必要です。

①マイページのプロフィール入力
②顔写真付きの本人確認書類

の2点が審査対象となります。

プロフィールにつきましては以下よりログイン後にマイページにてご登録ください。
https://choi-foot.com/view/login

顔写真付きの本人確認書類は以下のメールアドレスにご送付ください。
prod.noland1121@gmail.com

なお、審査には数週間のお時間をいただくことがございますがご了承ください。

以上、今後ともどうぞ宜しくお願い致します。

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
            <h3>コーチ登録完了</h3>
            <p>コーチ登録が完了しました。</p>
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
