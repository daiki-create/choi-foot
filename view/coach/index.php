



<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../component/head.php');  ?>
</head>
<body>
<?php
include ('../../component/nav.php');
?>
<div class="main">
    <div class="left">
        <br><br>
        <?php
        $error=htmlentities($_GET['message']);
        echo "<div class='message'>$error</div>";

        $id=$_GET['id'];
        $stmt=$pdo->query("select * from coaches where id='$id'");
        foreach ($stmt as $row){
            $name=$row['name'];
            $mail=$row['mail'];
            $prof=$row['prof'];
            $movie1=$row['movie1'];
            $movie2=$row['movie2'];
            $sub1=$row['sub1'];
            $sub2=$row['sub2'];
            $comment=$row['comment'];
            $prefecture=$row['prefecture'];
            $intro=$row['intro'];
            $career=$row['career'];
            $schedule=$row['schedule'];
            $locate=$row['locate'];
            $fee=$row['fee'];

            
            $mon=$row['mon'];
            $tue=$row['tue'];
            $wed=$row['wed'];
            $thu=$row['thu'];
            $fri=$row['fri'];
            $sat=$row['sat'];
            $sun=$row['sun'];

            echo ("
                <div class='coach-img-parent'>
                    <div class='left-img'>
                        <img class='main-img' src='../../img/$prof' alt=''>
                    </div>
                    <div class='right-img'>
                        <video class='sub-img' src='../../video/$movie1' controls></video>
                        <video class='sub-img' src='../../video/$movie2' controls></video>
                        <img class='sub-img' src='../../img/$sub1' alt=''>
                        <img class='sub-img' src='../../img/$sub2' alt=''>
                    </div>
                </div>
                
                <br>
                
                <div class='coach-info'>
                    <h2>$name($prefecture)</h2>
                    <p class='locate'>【レッスン場所】$locate</p>
                    <p class='intro ws-pw'>$intro</p>
                    <fieldset>
                        <legend>経歴</legend>
                        <p class='ws-pw'>$career</p>
                    </fieldset>
                </div>
                <div class='appointment'>
                    <h2>予約の取りやすい日時</h2>
                    <div class='week'>
                        <span>月曜日　:　</span><span>$mon</span>
                    </div>
                    <div class='week'>
                        <span>火曜日　:　</span><span>$tue</span>
                    </div>
                    <div class='week'>
                        <span>水曜日　:　</span><span>$wed</span>
                    </div>
                    <div class='week'>
                        <span>木曜日　:　</span><span>$thu</span>
                    </div>
                    <div class='week'>
                        <span>金曜日　:　</span><span>$fri</span>
                    </div>
                    <div class='week'>
                        <span>土曜日　:　</span><span>$sat</span>
                    </div>
                    <div class='week'>
                        <span>日曜日　:　</span><span>$sun</span>
                    </div>
                </div>
                <div>
                    <form action='form.php' method='post'>
                        <input type='hidden' value=$mail name='mail'>
                        <input type='hidden' value=$locate name='locate'>
                        <input type='hidden' value=$fee name='fee'>
                        <button type='submit' class='apply-btn'>お申込みへ進む</button>
                    </form>
                </div>
            ");
        }
        ?>
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
