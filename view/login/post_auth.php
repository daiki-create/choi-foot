


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

        $stmt=$pdo->prepare("insert into students (mail,name) values (:mail,:name)");
        $params=array(
            ':mail'=>$mail,
            ':name'=>$name
        );
        $stmt->execute($params);
    }
    // ユーザ登録やログイン処理など
    // 結果を出力
    session_start();
    $_SESSION['flag']=true;
    $_SESSION['student']=true;
    $_SESSION['coach']=true;

    $_SESSION['mail']=$mail;

    echo $userid;

} else {
    // Invalid ID token
    // 結果を出力
    echo null;
}

