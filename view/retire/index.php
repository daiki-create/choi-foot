



<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../component/head.php');  ?>
</head>
<body>
<?php
include ('../../component/nav.php')
?>
<div class="main">
    <div class="left">
        <div class='retire-parent ws-nomal'>
            <?php
            if($_SESSION['flag']==true){
                echo "
                <p>ちょいふっとを退会してもよろしいですか？</p>
                <input value='戻る' onclick='history.back();' type='button'>
                <button class='form-btn retire-btn' onclick=\"location.href='delete-account.php'\">退会する</button>
                ";
            }
            else{
                echo "
                <br><br>
                ログインしてください。
                ";
            }
            
            ?>
        </div>
    </div>
    <div class="right">
        <?php include('../../component/pr.php');  ?>
    </div>
</div>
<script>
    function click_coach_border(){
        document.getElementById('coach-border2').style.cssText='display:block'
        document.getElementById('student-border2').style.cssText='display:none'
        document.getElementById('coach-post').style.cssText='display:block'
        document.getElementById('student-post').style.cssText='display:none'
    }
    function click_student_border(){
        document.getElementById('coach-border2').style.cssText='display:none'
        document.getElementById('student-border2').style.cssText='display:block'
        document.getElementById('coach-post').style.cssText='display:none'
        document.getElementById('student-post').style.cssText='display:block'
    }
</script>
<?php
include ('../../component/footer.php')
?>
</body>
</html>

