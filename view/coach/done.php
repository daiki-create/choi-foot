



<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../component/head.php');
    session_start();
    if ($_SESSION['student']!=true){
        $uli=$_SERVER['HTTP_REFERER'];
        $message='生徒アカウントでログイン後にご利用いただけます。';
        header("location:".$uli."&message=$message");
        exit();
    }
    $mail=$_POST['mail'];
    $me=$_SESSION['mail'];
    if($mail==$me){
        $uli=$_SERVER['HTTP_REFERER'];
        $message='ご自身への申し込みはできません。';
        header("location:".$uli."&message=$message");
        exit();
    }
    ?>
    <?php include('../../component/head.php');  ?>
</head>
<body>
<?php
include ('../../component/nav.php');

$me=$_SESSION['mail'];
$coach=$_POST['mail'];
$month_date=$_POST['month_date'];
$hour=$_POST['hour'];
$minute=$_POST['minute'];
$locate=$_POST['locate'];
$util=$_POST['util'];
$fee=$_POST['fee'];
$content=$_POST['content'];

$stmt=$pdo->query("select * from coaches where mail='$coach'");
foreach ($stmt as $row){
    $coach_name=$row['name'];
    $coach_prof=$row['prof'];
}

$stmt=$pdo->query("select * from students where mail='$me'");
foreach ($stmt as $row){
    $student_name=$row['name'];
    $student_prof=$row['prof'];
}
$stmt=$pdo->prepare("insert into messages (sender,receiver,content,sender_name) values (:sender,:receiver,:content,:sender_name)");
$params=array(
        ':sender'=>$coach,
        ':receiver'=>$_SESSION['mail'],
        ':content'=>'
（このメッセージはシステムからの自動送信です。）<br>
レッスンのお申込みを受け付けました。<br>
出勤が確定された場合、レッスン料のお支払いに進めます。
        ',
        ':sender_name'=>$coach_name
);
$stmt->execute($params);

$stmt=$pdo->query("select * from message_posts where coach='$coach' and student='$me' limit 1");
$result=$stmt->fetch();
if($result==0){
    $stmt=$pdo->prepare("insert into message_posts (coach,student,coach_name,student_name,coach_prof,student_prof) values (:coach,:student,:coach_name,:student_name,:coach_prof,:student_prof)");
    $params=array(
            ':coach'=>$coach,
            ':student'=>$me,
            ':coach_name'=>$coach_name,
            ':student_name'=>$student_name,
            ':coach_prof'=>$coach_prof,
            ':student_prof'=>$student_prof
    );
    $stmt->execute($params);
}

$stmt=$pdo->prepare("insert into lessons (coach,student,coach_name,student_name,coach_prof,student_prof,month_date,hour,minute,util,content,locate,fee) values (:coach,:student,:coach_name,:student_name,:coach_prof,:student_prof,:month_date,:hour,:minute,:util,:content,:locate,:fee)");
$params=array(
    ':coach'=>$coach,
    ':student'=>$me,
    ':coach_name'=>$coach_name,
    ':student_name'=>$student_name,
    ':coach_prof'=>$coach_prof,
    ':student_prof'=>$student_prof,
    ':month_date'=>$month_date,
    ':hour'=>$hour,
    ':minute'=>$minute,
    ':util'=>$util,
    ':content'=>$content,
    ':locate'=>$locate,
    ':fee'=>$fee
);
$stmt->execute($params);

$subject="ちょいふっと　レッスンのお申込み";
$content="
(このメールはシステムからの自動送信です。)

$student_name さんからレッスンのお申込みがあります。
レッスンを承認する場合はサイト内より出勤の確定を完了してください。

【ログインはこちら】
https://choi-foot.com/view/login

【ご不明な点はこちらよりお問い合わせください】
https://choi-foot.com/view/contact

";
$headers="";
$to=$me;
mb_send_mail($to,$subject,$content,$headers);
?>
<div class="main">
    <div class="left">
        <div class='coach-done-parent'>
            <h1>仮予約完了</h1>
            <p>練習の詳細につきましてはチャットよりコーチと連絡を取ってください。</p>
        </div>
    </div>
    <div class="right">
        <?php include('../../component/pr.php');  ?>
    </div>
</div>
<?php
include ('../../component/footer.php');
include ('../../component/nav2.php');?>

</body>
</html>
