


<?php
include('../../component/head.php');
$mail=htmlentities($_POST['mail']);
$passwd=htmlentities($_POST['passwd']);
if(strlen(trim($mail))==null || strlen(trim($passwd))==null){
    $error="未入力欄があります。";
    header("location:index.php?error=$error");
    exit();
}
if(strlen(trim($mail))>100){
    $error="メールアドレスが長すぎます。";
    header("location:index.php?error=$error");
    exit();
}
if(strlen(trim($passwd))>20){
    $error="パスワードは20文字以下です。";
    header("location:index.php?error=$error");
    exit();
}

$stmt=$pdo->query("select * from coaches where mail='$mail'");
foreach ($stmt as $row){
    if ($row['mail']){
        session_start();
        $_SESSION['coach']=true;
    }
    $correct_passwd=$row['passwd'];
}
if ($passwd==$correct_passwd){
    session_start();
    $_SESSION['mail']=$mail;
    $_SESSION['flag']=true;
    header("location: ../index.php");
    exit();
}
else{
    $error='メールアドレスかパスワードが違います。';
    header("location:index.php?error=$error");
    exit();
}


