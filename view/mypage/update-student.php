<?php

include ("../../component/head.php");
session_start();
$me=$_SESSION['mail'];
$name=htmlentities($_POST['name']);
$mail=htmlentities($_POST['mail']);
$passwd=htmlentities($_POST['passwd']);
$passwd2=htmlentities($_POST['passwd2']);


if($passwd!=$passwd2){
    $error="確認パスワードが一致しません。";
    header("location:index.php?error=$error");
    exit();
}
if($name==null){
    $error = "名前を入力してください";
    header("location:index.php?error=$error");
    exit();
}
if($mail==null){
    $error = "メールアドレスを入力してください";
    header("location:index.php?error=$error");
    exit();
}
if(strlen(trim($passwd))<4){
    $error = "パスワードを4字以上で入力してください";
    header("location:index.php?error=$error");
    exit();
}

//アカウントのメールアドレス重複禁止
$stmt=$pdo->query("select mail from students where mail='$mail' limit 1");
$result=$stmt->fetch();
if($result>0 && $mail!=$me){
    $error="このメールアドレスはすでに使われています";
    header("Location:./index.php?error=$error");
    exit();
}

$stmt=$pdo->prepare("update students set name=:name, mail=:mail, passwd=:passwd where mail=:me");
$params=array(
    ':name'=>$name,
    ':mail'=>$mail,
    ':passwd'=>$passwd,
    ':me'=>$me
);
$stmt->execute($params);

$stmt=$pdo->prepare("update messages set sender_name=:student_name, sender=:student where sender=:me");
$params=array(
    ':student_name'=>$name,
    ':student'=>$mail,
    ':me'=>$me
);
$stmt->execute($params);

$stmt=$pdo->prepare("update messages set receiver=:student where receiver=:me");
$params=array(
    ':student'=>$mail,
    ':me'=>$me
);
$stmt->execute($params);

$stmt=$pdo->prepare("update message_posts set student=:student ,student_name=:student_name where student=:me");
$params=array(
    ':student_name'=>$name,
    ':student'=>$mail,
    ':me'=>$me
);
$stmt->execute($params);

$stmt=$pdo->prepare("update lessons set student=:student ,student_name=:student_name where student=:me");
$params=array(
    ':student_name'=>$name,
    ':student'=>$mail,
    ':me'=>$me
);
$stmt->execute($params);

$_SESSION['mail']=$mail;
$message='プロフィールを更新しました。';
header("location:index.php?message=$message");
exit();
