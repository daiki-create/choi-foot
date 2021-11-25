



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
    $locate=$_POST['locate'];
    $fee=$_POST['fee'];
    if($mail==$me){
        $uli=$_SERVER['HTTP_REFERER'];
        $message='ご自身への申し込みはできません。';
        header("location:".$uli."&message=$message");
        exit();
    }
    if($fee=='--'){
        $uli=$_SERVER['HTTP_REFERER'];
        $message='金額設定がされていないのでお申込みできません。';
        header("location:".$uli."&message=$message");
        exit();
    }
    ?>
    <?php include('../../component/head.php');  ?>
</head>
<body>
<?php
include ('../../component/nav.php');
?>
<div class="main">
    <div class="left">
        <?php
        echo "
        <form action=\"confirm.php\" method=\"post\" class='coach-form'>
            <div class='coach-form-item-parent'>
                <div class='coach-form-item-left'>
                    <h3>希望日時</h3>
                    <select class='coach-form-date' name='month_date' required length='2' id='month-date'>

                    </select>
                    <select class='coach-form-time' name='hour'>
                        <option value='9'>9</option>
                        <option value='10'>10</option>
                        <option value='11'>11</option>
                        <option value='12'>12</option>
                        <option value='13'>13</option>
                        <option value='14'>14</option>
                        <option value='15'>15</option>
                        <option value='16'>16</option>
                        <option value='17'>17</option>
                        <option value='18'>18</option>
                        <option value='19'>19</option>
                        <option value='20'>20</option>
                        <option value='21'>21</option>
                        <option value='22'>22</option>
                    </select>
                    <span>時
                    <select class='coach-form-time' name='minute'>
                        <option value='00'>00</option>
                        <option value='30'>30</option>
                    </select>分～
                    </span>
                </div><br>
                <div class='coach-form-item-right'>
                    <h3>利用時間</h3>
                    <select name=\"util\" id=\"\" class='coach-form-util'>
                        <option value=\"30\">30分</option>
                        <option value=\"60\">60分</option>
                        <option value=\"90\">90分</option>
                        <option value=\"120\">120分</option>
                        <option value=\"150\">150分</option>
                        <option value=\"180\">180分</option>
                        <option value=\"210\">210分</option>
                        <option value=\"240\">240分</option>
                    </select>
                </div>
            </div>
            <div class='coach-form-area-parent'>
                <h3>教わりたい内容</h3>
                <textarea class='coach-form-area' name=\"content\" id=\"\" cols=\"30\" rows=\"10\" required></textarea>
            </div>
            <input type=\"hidden\" name=\"locate\" value='$locate'>
            <input type=\"hidden\" name=\"fee\" value='$fee'>
            <input type='hidden' value=$mail name='mail'>
            <button class='form-btn' type=\"submit\">確認画面へ</button>
        </form> 
        "
        ?>

    </div>
    <div class="right">
        <?php include('../../component/pr.php');  ?>
    </div>
</div>
<?php
include ('../../component/footer.php');
include ('../../component/nav2.php');?>
<script>
    date1=new Date();
    var month=date1.getMonth()+1;
    var date=date1.getDate();
    for(var i=1 ; i<41 ; i++){
        date++;
        if(month==2){
            if(date==29){
                date=1;
                month++;
            }
        }
        if(month==4 || month==6 || month==9 || month==11 ){
            if(date==31){
                date=1;
                month++;
            }
        }
        else{
            if(date==32){
                date=1;
                month++;
            }
        }
        $('#month-date').append('<option value=\"'+month+'月'+date+'日'+'\">'+month+'月'+date+'日'+'</option>')

    }
</script>
</body>
</html>
