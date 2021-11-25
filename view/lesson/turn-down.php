


<?php
include '../../component/head.php';
session_start();
$me=$_SESSION['mail'];
$id=htmlentities($_POST['id']);
$student=htmlentities($_POST['mail']);

$stmt=$pdo->prepare("delete from lessons where id='$id'");
$stmt->execute();

$stmt=$pdo->query("select name from coaches where mail='$me'");
foreach($stmt as $row){
        $me_name=$row['name'];
}

$stmt=$pdo->prepare("insert into messages (sender,receiver,content,sender_name) values (:sender,:receiver,:content,:sender_name)");
$params=array(
        ':sender'=>$me,
        ':receiver'=>$student,
        ':content'=>'
（このメッセージはシステムからの自動送信です。）
今回の予約はお断りしました。
またの機会のお申込みをお待ちしております。
        ',
        ':sender_name'=>$me_name
);
$stmt->execute($params);


