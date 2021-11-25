


<?php
require_once '../../vendor/autoload.php';
include '../../component/head.php';

// POSTで送られてくるトークンを取得.
$id_token = filter_input(INPUT_POST, 'idtoken');

$client = new Google_Client(['client_id' => '306983217223-8ku9u1grr7s2g0tsmv1efcppkrpfrrqi.apps.googleusercontent.com']);
$payload = $client->verifyIdToken($id_token);

if ($payload) {
    $userid = $payload['sub'];
    $mail=$payload['email'];
    $name=$payload['name'];

    $make_new=null;
    $stmt=$pdo->query("select * from students where mail='$mail'");

    $result= $stmt->fetchAll();
    if (count($result)===0){
        $make_new=true;
    }

    if ($make_new===true){
        $stmt=$pdo->prepare("insert into students (mail,name) values (:mail,:name)");
        $params=array(
            ':mail'=>$mail,
            ':name'=>$name
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
    }
    // ユーザ登録やログイン処理など
    // 結果を出力
    session_start();
    $_SESSION['flag']=true;
    $_SESSION['student']=true;
    $_SESSION['coach']=false;

    $_SESSION['mail']=$mail;

    echo $userid;

} else {
    // Invalid ID token
    // 結果を出力
    echo null;
}


