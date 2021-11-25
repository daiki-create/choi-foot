<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../component/head.php');  ?>
    <meta name="google-signin-client_id" content="306983217223-8ku9u1grr7s2g0tsmv1efcppkrpfrrqi.apps.googleusercontent.com">
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
        <div class="font15px about-parent">
           
            <h2>生徒登録について</h2>
            <p>レンタルコーチは最短で30分からコーチをレンタルして
            フットボールを直接指導してもらえるサービスです。</p>
            <p>
            ・サッカーを始めてみたいけどチームに入るほどではない...<br>
            ・キックのフォームを改善したい<br>
            ・1対1に付き合ってほしい<br>
            ・戦術について語りたい<br>
            ・フリースタイルのかっこいい足技を伝授してほしい<br><br>
            などの様々な声に応えてくれるコーチを探してみましょう。</p>

            <h2>ご利用について</h2>
            <p>30分あたりの料金はコーチによって自由に決められています。<br>
            レッスン料のお支払方法はレッスン開始前に<br>
            クレジットカードで都度決済、または銀行振り込みとなります。</p>
        </div>
        <form class="form about-form" action="pin.php" method="post">
            <input class="form-item" type="email" placeholder="メールアドレス" name="mail" maxlength='50' required><br><br>
            <input class="form-btn" type="submit" value="生徒登録へ">
        </form>
        <br>
                <div align='center'>または</div>
                <div class="g-signin2" style="margin-left:calc(50% - 60px);border-radius: 10px" data-onsuccess="onSignIn_student"></div>
    </div>
    <div class="right">
        <?php include('../../component/pr.php');  ?>
    </div>
</div>
<?php
include ('../../component/footer.php');
include ('../../component/nav2.php');?>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script>

function onSignIn_student(googleUser) {

// トークンの取得（サーバーにはこちらを送信）
var id_token = googleUser.getAuthResponse().id_token;

// 接続を解除して、2回目以降の自動ログインを防止
var auth2 = gapi.auth2.getAuthInstance();
auth2.disconnect();

// 5.サーバへ送信
var xhr = new XMLHttpRequest();

// open()で指定するのは、サーバ側のURL
xhr.open('POST', '../login/post_auth_student.php');
xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

// 処理が終わった後に呼ばれるコールバック
xhr.onload = function() {
    if(xhr.readyState == 4 && xhr.status == 200){
        // ログイン完了後にリダイレクト
        window.location.href = 'https://choi-foot.com/view/mypage/index.php';
    }
    else{
        console.log('エラー');
    }
};
xhr.send('idtoken=' + id_token);
}
</script>
</body>
</html>
