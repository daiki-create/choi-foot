


<?php
include "../../component/head.php";
session_start();
$student=$_SESSION['mail'];
$coach=htmlentities($_POST['mail']);
$content=htmlentities($_POST['content']);
if (strlen($content)>400){
    $error="メッセージは400文字までです。";
    header("location:#?error=$error");
    exit();
}
$student_name='';
$stmt=$pdo->query("select * from students where mail='$student'");
foreach ($stmt as $row){
    $student_name=$row['name'];
}
$stmt=$pdo->prepare("insert into messages (sender,receiver,content,sender_name) values (:sender,:receiver,:content,:sender_name)");
$params=array(
    ':sender'=>$student,
    ':receiver'=>$coach,
    ':content'=>$content,
    ':sender_name'=>$student_name,
);
$stmt->execute($params);
