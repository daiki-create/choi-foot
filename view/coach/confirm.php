



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
$month_date=$_POST['month_date'];
$hour=$_POST['hour'];
$minute=$_POST['minute'];
$util=$_POST['util'];
$locate=$_POST['locate'];
$fee=$_POST['fee'];
$content=$_POST['content'];
$mail=$_POST['mail'];
$total=$fee*$util/30;
if($total>10000){
    $uli=$_SERVER['HTTP_REFERER'];
        $message='10000円以上のお申込みはできません。';
        header("location:".$uli."&message=$message");
        exit();
}
?>
<div class="main">
    <div class="left">
        <div class='confirm-parent'>
            <p class='confirmation'>以下の内容で確定してもよろしいですか？</p>
            <h3>希望日時</h3>
            <?php echo ("<div>$month_date $hour 時 $minute 分</div>");?>
            <h3>利用時間</h3>
            <?php echo ("<div>$util 分</div>");?>
            <h3>レッスン料金</h3>
            <?php echo ("<div>$total 円</div>");?>
            <h3>教わりたい内容</h3>
            <?php echo ("<div class='ws-pw'>$content</div>");?>
            <form action='done.php' method="post">
                <?php
                echo ("<input type='hidden' value=$mail name='mail'>
                        <input type='hidden' value=$month_date name='month_date'>
                        <input type='hidden' value=$hour name='hour'>
                        <input type='hidden' value=$minute name='minute'>
                        <input type='hidden' value=$locate name='locate'>
                        <input type='hidden' value=$fee name='fee'>
                        <input type='hidden' value=$util name='util'>
                        <textarea hidden name='content'>$content</textarea>")
                ?>
                <input class="form-btn" type='submit' value='OK'>
            </form>
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
