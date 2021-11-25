


<?php
include '../../component/head.php';
session_start();
include '../../component/head.php';

$me=$_SESSION['mail'];
$student=htmlentities($_POST['mail']);
$id=htmlentities($_POST['id']);

$sender_name="";
$stmt=$pdo->query("select * from coaches where mail ='$me'");
foreach ($stmt as $row){
    $sender_name=$row['name'];
}
$stmt=$pdo->prepare("insert into messages (sender,receiver,content,sender_name) values (:sender,:receiver,:content,:sender_name)");
$params=array(
    ":sender"=>$me,
    ":receiver"=>$student,
    ":content"=>"
（このメッセージはシステムからの自動送信です。）
予約が確定されました。
送付されたメール内容に従ってレッスン料金をお支払いください。
    ",
    ":sender_name"=>$sender_name
);
$stmt->execute($params);

$subject='ちょいふっと 予約確定のお知らせ';
$content="
（このメールはシステムからの自動送信です。）

$sender_name コーチにより予約が確定されました。
レッスン料金につきましては銀行振込またはクレジットカード決済にてお願いいたします。

<お支払期限：レッスン開始時間まで>

・銀行振込の場合
    銀行名：横浜銀行
    支店名：六角橋支店
    口座番号：6177100

・クレジットカード決済の場合
    サイト内よりお支払い手続きを完了してください。

【ログインはこちら】
https://choi-foot.com/view/login
    
【ご不明な点がございましたらこちらよりお問い合わせください】
https://choi-foot.com/view/contact
";
$headers="";
mb_send_mail($student,$subject,$content,$headers);

$stmt=$pdo->prepare("update lessons set attendance=:attendance where id=:id");
$params=array(
    ":attendance"=>1,
    ":id"=>$id
);
$stmt->execute($params);

