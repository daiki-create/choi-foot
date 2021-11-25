

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
        <?php
        $mail=htmlentities($_POST['mail']);
        $name=htmlentities($_POST['name']);
        $passwd=htmlentities($_POST['passwd']);
        $passwd2=htmlentities($_POST['passwd2']);
        if ($passwd!=$passwd2){
            $error="パスワードが一致しません。";
            header("location: personal.php?error=$error&mail=$mail");
            exit();
        }
        if($name==null or $passwd==null){
            $error="未入力の欄があります。";
            header("location: personal.php?error=$error&mail=$mail");
            exit();
        }
        if (strlen(trim($name))>20){
            $error="ユーザー名は20文字以下です。";
            header("location: personal.php?error=$error&mail=$mail");
            exit();
        }
        if (strlen(trim($passwd))>20){
            $error="パスワードは20文字以下です。";
            header("location: personal.php?error=$error&mail=$mail");
            exit();
        }
        echo ("
            <div class='form confirm-form'>
                <p>以下の内容でよろしいですか？<br>修正する場合は[戻る]を押してください。</p>
                <div class='confirm'>
                    <div>ユーザー名 : $name</div>
                    <div>パスワード : $passwd</div>
                </div>
            
                <form action='done.php' method='post' class='ws-normal'>
                    <input type='hidden' value='$mail' name='mail'>
                    <input type='hidden' value='$name' name='name'>
                    <input type='hidden' value='$passwd' name='passwd'><br>
                    <input class='form-btn' onclick='history.back()' type='button' value='< 戻る'><br>
                    <input class='form-btn' type='submit' value='確定 >'>
                </form>
            </div>
            
            ");
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
