
<?php
include('../../component/head.php');

$mail=htmlentities($_POST['mail']);
$pin=rand(10000,99999);
if ($_GET['mail']!=null){
    $mail=htmlentities($_GET['mail']);
}

if ($mail==null){
    $error="メールアドレスが未入力です。";
    header("Location:./index.php?error=$error");
    exit();
}

$reg_str="/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/";
if(!preg_match($reg_str,$mail)){
    $error="メールアドレスの形式が正しくありません。";
    header("Location:./index.php?error=$error");
    exit();
}

//アカウントのメールアドレス重複禁止
$stmt=$pdo->query("select mail from coaches where mail='$mail' limit 1");
$result=$stmt->fetch();
if($result>0){
    $error="このメールアドレスはすでに使われています";
    header("Location:./index.php?error=$error");
    exit();
}

$subject='ちょいふっと';
$content="
（このメールはシステムからの自動送信です。）

【PIN】
$pin

サイト内より上記のPINを入力してアカウントの登録を完了してください。

【ご不明な点がございましたらこちらよりお問い合わせください】
https://choi-foot.com/view/contact

";
$headers='';
mb_send_mail($mail,$subject,$content,$headers);
?>

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
        $error=htmlentities($_GET['error']);
        echo "<div class='message'>$error</div>";
        ?>

        <form class="form pin-form" action="personal.php" method="post">
            <p>入力したメールアドレス宛にPINを送信しました。</p>
            <?php
            echo ("<input type='hidden' value='$pin' name='pin' required>
                　 <input type='hidden' value='$mail' name='mail'> 
            ")
            ?>
            <input class='form-item' type='text' name='input-pin' placeholder='PIN' pattern="^\d{5}" maxlength='5' minlength='5'><br><br>
            <input class="form-btn" type="submit" value="次へ">
        </form>
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

