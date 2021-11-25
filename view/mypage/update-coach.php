<?php


include ("../../component/head.php");
session_start();
$me=$_SESSION['mail'];
$name=htmlentities($_POST['name']);
$mail=htmlentities($_POST['mail']);
$passwd=htmlentities($_POST['passwd']);
$passwd2=htmlentities($_POST['passwd2']);
$prefecture=htmlentities($_POST['prefecture']);
$fee=htmlentities($_POST['fee']);
$comment=htmlentities($_POST['comment']);
$intro=htmlentities($_POST['intro']);
$career=htmlentities($_POST['career']);

$bank=htmlentities($_POST['bank']);
$type=htmlentities($_POST['type']);
$branch=htmlentities($_POST['branch']);
$number=htmlentities($_POST['number']);
$holder=htmlentities($_POST['holder']);

$locate=htmlentities($_POST['locate']);

$mon=htmlentities($_POST['mon']);
$tue=htmlentities($_POST['tue']);
$wed=htmlentities($_POST['wed']);
$thu=htmlentities($_POST['thu']);
$fri=htmlentities($_POST['fri']);
$sat=htmlentities($_POST['sat']);
$sun=htmlentities($_POST['sun']);

//アカウントのメールアドレス重複禁止
$stmt=$pdo->query("select mail from coaches where mail='$mail' limit 1");
$result=$stmt->fetch();
if($result>0 && $mail!=$me){
    $error="このメールアドレスはすでに使われています";
    header("Location:./index.php?error=$error");
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
if($passwd!=$passwd2) {
    $error = "確認パスワードが一致しません。";
    header("location:index.php?error=$error");
    exit();
}
if($fee<50){
    $error = "30分あたりの最低料金は50円です。";
    header("location:index.php?error=$error");
    exit();
}
if($fee>9999){
    $error = "30分あたりの最高料金は9999円です。";
    header("location:index.php?error=$error");
    exit();
}
    $stmt=$pdo->prepare("update coaches set name=:name, mail=:mail, passwd=:passwd, prefecture=:prefecture, fee=:fee, comment=:comment, intro=:intro, career=:career,
    bank=:bank, type=:type,branch=:branch, number=:number,holder=:holder,locate=:locate,
    mon=:mon,tue=:tue,wed=:wed,thu=:thu,fri=:fri,sat=:sat,sun=:sun where mail=:me");
$params=array(
    ':name'=>$name,
    ':mail'=>$mail,
    ':passwd'=>$passwd,
    ':prefecture'=>$prefecture,
    ':fee'=>$fee,
    ':comment'=>$comment,
    ':intro'=>$intro,
    ':career'=>$career,
    
    ':bank'=>$bank,
    ':type'=>$type,
    ':branch'=>$branch,
    ':number'=>$number,
    ':holder'=>$holder,

    ':locate'=>$locate,

    ':mon'=>$mon,
    ':tue'=>$tue,
    ':wed'=>$wed,
    ':thu'=>$thu,
    ':fri'=>$fri,
    ':sat'=>$sat,
    ':sun'=>$sun,
    
    ':me'=>$me
);
$stmt->execute($params);

$stmt=$pdo->prepare("update messages set sender_name=:coach_name, sender=:coach where sender=:me");
$params=array(
    ':coach_name'=>$name,
    ':coach'=>$mail,
    ':me'=>$me
);
$stmt->execute($params);

$stmt=$pdo->prepare("update messages set receiver=:coach where receiver=:me");
$params=array(
    ':coach'=>$mail,
    ':me'=>$me
);
$stmt->execute($params);

$stmt=$pdo->prepare("update message_posts set coach=:coach ,coach_name=:coach_name where coach=:me");
$params=array(
    ':coach_name'=>$name,
    ':coach'=>$mail,
    ':me'=>$me
);
$stmt->execute($params);

$stmt=$pdo->prepare("update lessons set coach=:coach ,coach_name=:coach_name where coach=:me");
$params=array(
    ':coach_name'=>$name,
    ':coach'=>$mail,
    ':me'=>$me
);
$stmt->execute($params);

$_SESSION['mail']=$mail;
$message='プロフィールを更新しました。';
header("location:index.php?message=$message");
exit();
