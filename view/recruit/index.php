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
            
            <h2>レンタルコーチ登録について</h2>
            <p>レンタルコーチは最短で30分からフットボールを直接指導できるサービスです。</p>
            <p>教える内容も自由なので様々なニーズがあるでしょう。</p>
            <p>
            ・キックの基礎なら教えられる<br>
            ・ディフェンダー経験があるので1対1のDFだけなら付き合ってあげられる<br>
            ・戦術に詳しいので一緒にサッカー、フットサルについて語ってあげられる<br>
            ・フリースタイルが好きでかっこいい足技を伝授できる<br><br>
            など何か一つでも自分の武器があれば喜んでくれる生徒さんは見つかるはずです。</p>

            <h2>ご利用について</h2>
            <p>サイトの<a href='../'>ホーム画面</a>へのコーチの掲載には審査がございます。</p>
            <p>アカウントをご登録いただいた後にマイページよりアカウント情報の設定を行ってください。</p>
            <p>アカウントが認められた場合のみコーチに通知が届き<a href='../'>ホーム画面</a>への掲載が行われます。</p>
            <div class='recruit-point'>
                <h2>審査通過の3ポイント</h2>
                <ol>
                    <li>プロフィールにはっきりと顔の写った写真と全身の写った写真を最低1枚ずつ設定しましょう。</li><br>
                    <li>フットボールの経歴や自己紹介をできるだけ詳細に記述し、<br>
                    「このコーチは何を教えてくれるのか」<br>
                    ということがはっきりと生徒さんにわかるように明示することを心がけましょう。</li><br>
                    <li>プレー姿や自己紹介ビデオなどをプロフィール動画にしておくとなお良いです。</li>
                </ol>
            </div>
            <p>また、フットボールの経歴によっては審査に通らないこともございますのでご了承ください。</p>
            
        </div>
        <form class="form about-form" method="post" action="pin.php">
            <input class="form-item" type="email" placeholder="メールアドレス" name="mail" maxlength='50' required><br><br>
            <input class="form-btn" type="submit" value="コーチ登録へ">
        </form>
        <br>
                <div align='center'>または</div>
                <div  class="g-signin2" style="margin-left:calc(50% - 60px);border-radius: 10px" data-onsuccess="onSignIn_coach"></div>
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
function onSignIn_coach(googleUser) {

    // トークンの取得（サーバーにはこちらを送信）
    var id_token = googleUser.getAuthResponse().id_token;

    // 接続を解除して、2回目以降の自動ログインを防止
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.disconnect();

    // 5.サーバへ送信
    var xhr = new XMLHttpRequest();

    // open()で指定するのは、サーバ側のURL
    xhr.open('POST', '../login/post_auth_coach.php');
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
