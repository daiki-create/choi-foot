


<?php
include '../../component/head.php';
session_start();
$me=$_SESSION['mail'];
if($_SESSION['coach']==true){
    $stmt=$pdo->prepare("delete from coaches where mail='$me'");
    $stmt->execute();
}
if($_SESSION['student']==true){
    $stmt=$pdo->prepare("delete from students where mail='$me'");
    $stmt->execute();
}

session_destroy();
$message="退会処理が完了しました。";
header("location:../login/index.php?error=$message");
exit();