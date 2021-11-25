


<?php
include '../../component/head.php';
session_start();
$me=$_SESSION['mail'];
$id=htmlentities($_POST['id']);
$coach=htmlentities($_POST['coach']);

$stmt=$pdo->prepare("delete from lessons where id='$id'");
$stmt->execute();

$stmt=$pdo->query("select name from students where mail='$me'");
foreach($stmt as $row){
        $me_name=$row['name'];
}

//チャットにキャンセル通知
$stmt=$pdo->prepare("insert into messages (sender,receiver,content,sender_name) values (:sender,:receiver,:content,:sender_name)");
$params=array(
        ':sender'=>$me,
        ':receiver'=>$coach,
        ':content'=>'
（このメッセージはシステムからの自動送信です。）
予約をキャンセルしました。
        ',
        ':sender_name'=>$me_name
);
$stmt->execute($params);
