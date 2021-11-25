



<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../component/head.php');  ?>
    <meta name="google-signin-client_id" content="306983217223-8ku9u1grr7s2g0tsmv1efcppkrpfrrqi.apps.googleusercontent.com">
</head>
<body>
<?php
include ('../../component/nav.php');
?>
<div class="main">
    <div class="left">
        <?php
        $error=htmlentities($_GET['error']);
        echo "<div class='message'>$error</div>"
        ?>
        <br>
        <div class='login-parent'>
            <div class="login-box">
                <h3 style="color: coral" class='login-title'>コーチアカウントでログイン</h3>
                <form class="form" action="check_pass_coach.php" method="post">
                    <input class="form-item login-form-item" type="email" name="mail" placeholder="メールアドレス" maxlength="100" minlength="3"><br><br>
                    <input class="form-item login-form-item" type="password" name="passwd" placeholder="パスワード"maxlength="20" minlength="4"><br><br>
                    <input class="login-btn" type="submit" value="ログイン">
                </form><br><br>
                <div>または</div>
                <div  class="g-signin2" style="margin-left:calc(50% - 60px);border-radius: 10px" data-onsuccess="onSignIn_coach"></div>
            </div>
            <div class="login-box">
                <h3 style="color: gold" class='login-title'>生徒アカウントでログイン</h3>
                <form class="form" action="check_pass_student.php" method="post">
                    <input class="form-item login-form-item" type="email" name="mail" placeholder="メールアドレス" maxlength="100" minlength="3"><br><br>
                    <input class="form-item login-form-item" type="password" name="passwd" placeholder="パスワード"maxlength="20" minlength="4"><br><br>
                    <input class="login-btn" type="submit" value="ログイン">
                </form><br><br>
                <div>または</div>
                <div  class="g-signin2" style="margin-left:calc(50% - 60px);border-radius: 10px" data-onsuccess="onSignIn_student"></div>
            </div>
            <br><br><br>
            <div class="ta-center">
            <div class="make-new-nav">アカウントをお持ちでない方</div>
                <div class="make-new-parent">
                    <a class="make-new" href="../recruit/index.php" style="color: coral"><コーチアカウントを作成></a>
                </div>
                <div class="make-new-parent">
                    <a class="make-new" href="../use/index.php" style="color: gold"><生徒アカウントを作成></a>
                </div>
            </div>
        </div>
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
    xhr.open('POST', 'post_auth_coach.php');
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


function onSignIn_student(googleUser) {

// トークンの取得（サーバーにはこちらを送信）
var id_token = googleUser.getAuthResponse().id_token;

// 接続を解除して、2回目以降の自動ログインを防止
var auth2 = gapi.auth2.getAuthInstance();
auth2.disconnect();

// 5.サーバへ送信
var xhr = new XMLHttpRequest();

// open()で指定するのは、サーバ側のURL
xhr.open('POST', 'post_auth_student.php');
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

