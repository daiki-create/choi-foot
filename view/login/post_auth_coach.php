


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
    $stmt=$pdo->query("select * from coaches where mail='$mail'");

    $result= $stmt->fetchAll();
    if (count($result)===0){
        $make_new=true;
    }

    if ($make_new===true){
        $stmt=$pdo->prepare("insert into coaches (mail,name) values (:mail,:name)");
        $params=array(
            ':mail'=>$mail,
            ':name'=>$name
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
    }
    // ユーザ登録やログイン処理など
    // 結果を出力
    session_start();
    $_SESSION['flag']=true;
    $_SESSION['coach']=true;
    $_SESSION['student']=false;

    $_SESSION['mail']=$mail;

    echo $userid;

} else {
    // Invalid ID token
    // 結果を出力
    echo null;
}


