



<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../component/head.php');  ?>
</head>
<body>
<?php
include ('../../component/nav.php')
?>
<div class="main" style="margin-bottom:200px ">
    <div class="left">
        <br>
        <br>
        <?php
        $error=htmlentities($_GET['error']);
        echo "<div class='message'>$error</div>";
        ?>
        <div class='mypage-parent'>
            <?php
            session_start();
            $mail=$_SESSION['mail'];
            $stmt=$pdo->query("select * from coaches where mail='$mail'");
            foreach ($stmt as $row){
                $coach_name=$row['name'];
                $coach=$row['mail'];
                $passwd=$row['passwd'];

                $prefecture=$row['prefecture'];
                $fee=$row['fee'];
                $comment=$row['comment'];
                $prof=$row['prof'];

                $movie1=$row['movie1'];
                $movie2=$row['movie2'];
                $sub1=$row['sub1'];
                $sub2=$row['sub2'];

                $intro=$row['intro'];
                $career=$row['career'];
                $locate=$row['locate'];

                $bank=$row['bank'];
                $type=$row['type'];
                $branch=$row['branch'];
                $number=$row['number'];
                $holder=$row['holder'];

                $mon=$row['mon'];
                $tue=$row['tue'];
                $wed=$row['wed'];
                $thu=$row['thu'];
                $fri=$row['fri'];
                $sat=$row['sat'];
                $sun=$row['sun'];

                $pass=$row['pass'];

            }
                if($_SESSION['coach']==true){
                    echo "
                    <div class='prof-parent'>
                        <div class='left-img'>
                            <img class='main-img' src='../../img/$prof' alt=''>
                        </div>
                        <div class='right-img'>
                            <video class='sub-img sub-video' src='../../video/$movie1' controls></video>
                            <video class='sub-img sub-video' src='../../video/$movie2' controls></video>
                            <img class='sub-img' src='../../img/$sub1' alt=''>
                            <img class='sub-img' src='../../img/$sub2' alt=''>
                        </div>
                        <div style='width:100%'>
                            <form action='edit-prof.php' method='post' enctype='multipart/form-data' >
                                <label for='coach-prof-form' class='prof-label' >画像を選択</label> 
                                <input type='file' name='coach_prof' id='coach-prof-form' style='display:none;'>
                                <input type='hidden' name='old_coach_prof' value='$prof'>
                                <input type='submit' id='edit' value='変更' >
                            </form>
                            <a href='edit-sub.php' style='float:right;color:lightgreen'>サブコンテンツを編集</a>
                        </div>
                    </div>
                    <br><br>
                    ";
                    if($pass==0){
                        echo "
                        <div style='heigit:80px;width:100%;margin-left:30px;margin-bottom:30px'>
                            <a align='center' href='../recruit'>審査通過のポイント</a>
                        </div>
                        ";
                    }
                    echo "
                    <form action='update-coach.php' method='post' class='mypage-form'>
                            <label for='' class='mypage-label'>ユーザー名</label>
                            <input class='mypage-form-item' maxlength='20' minlength='1' name='name' class='form-item' type='text' value='$coach_name' required ><br><br>
                            
                            <label for='' class='mypage-label'>メールアドレス</label>
                            <input class='mypage-form-item' maxlength='100' name='mail' class='form-item' type='text' value='$coach' required ><br><br>
                            
                            <label for='' class='mypage-label'>パスワード</label>
                            <input class='mypage-form-item' maxlength='20' minlength='4' name='passwd' class='form-item' type='password' value='$passwd' required ><br><br>
                            
                            <label for='' class='mypage-label'>パスワード（確認）</label>
                            <input class='mypage-form-item' maxlength='20' minlength='4' name='passwd2' class='form-item' type='password' value='$passwd' required ><br><br>
                                                    
                            <label for='' class='mypage-label'>都道府県</label>
                            <select class='mypage-form-item' required class='form-item2' name='prefecture' id='prefecture' class='form-item'>
                                <option value='$prefecture'>$prefecture</option>
                            </select><br><br>
                            
                            <label for='' class='mypage-label'>レッスン場所</label>
                            <input class='mypage-form-item' maxlength='100' name='locate' class='form-item' type='text' value='$locate' required ><br><br>
                            
                            <label for='' class='mypage-label'>料金（円）/30分</label>
                            <input class='mypage-form-item' maxlength='10' name='fee' class='form-item' type='text' value='$fee' required >
                            <p class='mgn-l-5per ws-normal'>**料金のうち10%はシステム利用料となります。</p><br><br>
                            
                            <label for='' class='mypage-label'>コメント</label>
                            <input class='mypage-form-item' maxlength='30' name='comment' class='form-item' type='text' value='$comment' ><br><br>
                            
                            <div class='mypage-label'>自己紹介・レッスン内容</div>
                            <textarea class='mypage-form-item' maxlength='400' class='form-area' name='intro' cols='30' rows='10' >$intro</textarea><br><br>
                            
                            <div class='mypage-label'>経歴</div>
                            <textarea class='mypage-form-item' maxlength='400' class='form-area' name='career' cols='30' rows='10' >$career</textarea><br><br>
                            
                            <h3 class='mgn-l-5per'>給与振込口座</h3>
                            <p class='mgn-l-5per ws-normal'>**給与の振り込みはレッスン翌月の<br>25日になります。</p><br><br>

                            <label for='' class='mypage-label'>金融機関名</label>
                            <input class='mypage-form-item' maxlength='20' name='bank' class='form-item' type='text' value='$bank'><br><br>
                            
                            <label for='' class='mypage-label'>預金種目</label>
                            <input maxlength='20'name='type' type='radio' value='current'>
                            <label for=''>普通</label> 
                            <input maxlength='20' name='type' type='radio'  value='nomal'>
                            <label for=''>当座</label><br><br>

                            <label for='' class='mypage-label'>支店名</label>
                            <input class='mypage-form-item' maxlength='20' name='branch' class='form-item' type='text' value='$branch'><br><br>
                            
                            <label for='' class='mypage-label'>口座番号</label>
                            <input class='mypage-form-item' maxlength='7' name='number' class='form-item' type='text' value='$number' ><br><br>

                            <label for='' class='mypage-label'>名義人(カタカナ)</label>
                            <input class='mypage-form-item' maxlength='50' name='holder' class='form-item' type='text' value='$holder' ><br><br>
                            
                            <div>
                                <h3 class='mgn-l-5per'>予約の取りやすい日時</h3>

                                <label for='' class='mypage-label'>月曜日</label>
                                <input class='mypage-form-item' maxlength='20' name='mon' class='form-item' type='text' value='$mon'><br><br>
                                <label for='' class='mypage-label'>火曜日</label>
                                <input class='mypage-form-item' maxlength='20' name='tue' class='form-item' type='text' value='$tue'><br><br>
                                <label for='' class='mypage-label'>水曜日</label>
                                <input class='mypage-form-item' maxlength='20' name='wed' class='form-item' type='text' value='$wed'><br><br>
                                <label for='' class='mypage-label'>木曜日</label>
                                <input class='mypage-form-item' maxlength='20' name='thu' class='form-item' type='text' value='$thu'><br><br>
                                <label for='' class='mypage-label''>金曜日</label>
                                <input class='mypage-form-item' maxlength='20' name='fri' class='form-item' type='text' value='$fri'><br><br>
                                <label for='' class='mypage-label'>土曜日</label>
                                <input class='mypage-form-item' maxlength='20' name='sat' class='form-item' type='text' value='$sat'><br><br>
                                <label for='' class='mypage-label'>日曜日</label>
                                <input class='mypage-form-item' maxlength='20' name='sun' class='form-item' type='text' value='$sun'><br><br>
                            </div>
                                                    
                            <input class='form-btn' type='submit' value='プロフィールを更新'>
                    </form>

                    <script >
                        var prefecture=Array('北海道','青森県','岩手県','宮城県','秋田県','山形県','福島県','茨城県','栃木県','群馬県','埼玉県','千葉県','東京都','神奈川県','新潟県','富山県','石川県','福井県','山梨県','長野県','岐阜県','静岡県','愛知県','三重県','滋賀県','京都府','大阪府','兵庫県','奈良県','和歌山県','鳥取県','島根県','岡山県','広島県','山口県','徳島県','香川県','愛媛県','高知県','福岡県','佐賀県','長崎県','熊本県','大分県','宮崎県','鹿児島県','沖縄県');
                        for (i=0;i<prefecture.length;i++){
                            option=document.createElement(\"option\");
                            option.innerText=prefecture[i];
                            document.getElementById('prefecture').appendChild(option);
                        }
                    </script>

            ";
                }

            ?>
           
        </div>
        <div class='mypage-parent'>
            <?php
            $stmt=$pdo->query("select * from students where mail='$mail'");
            foreach ($stmt as $row){
                $student_name=$row['name'];
                $student=$row['mail'];
                $passwd2=$row['passwd'];
                $prof2=$row['prof'];
                $student=$row['mail'];
            }
            if($_SESSION['student']==true){
                echo ("
                <div class='prof-parent'>
                    <img src='../../img/$prof2' alt='' class='student-prof'>
                    <form method='post' action='edit-prof.php' enctype='multipart/form-data'>
                       <label for='student-prof-form' class='prof-label'>画像を選択</label> 
                       <input type='file' name='student_prof' id='student-prof-form' style='display: none'>
                       <input type='hidden' name='old_student_prof' value='$prof2'>
                       <input type='submit' id='edit' value='変更' >
                    </form>             
                </div>
                <script>
                    document.getElementById('student-prof-form').onchange=function (){
                    }
                </script>
                <br><br>
                <form action=\"update-student.php\" method='post' class='mypage-form'>
                    <label for='' class='mypage-label'>ユーザー名</label>
                    <input maxlength='20' minlength='1' name='name' class='mypage-form-item' type='text' value=$student_name required><br><br>
                    
                    <label for='' class='mypage-label'>メールアドレス</label>
                    <input maxlength='100' name='mail' class='mypage-form-item' type='text' value=$student required><br><br>
                    
                    <label for='' class='mypage-label'>パスワード</label>
                    <input maxlength='20' minlength='4' name='passwd' class='mypage-form-item' type='password' value=$passwd2 required><br><br>
                    
                    <label for='' class='mypage-label'>パスワード（確認）</label>
                    <input maxlength='20' minlength='4' name='passwd2' class='mypage-form-item' type='password' value=$passwd2 required><br><br>
                                        
                    <input class='form-btn' type='submit' value='プロフィールを更新'>

                </form>
        ");
            }

            if($_SESSION['coach']==false && $_SESSION['student']==false){
                echo "<div class='message'><a href='../login'>ログインしてください。</a></div>";
            }
            ?>
        </div>
    </div>
    <div class="right">
        <?php include('../../component/pr.php');  ?>
    </div>
</div>
<?php
include ('../../component/footer.php');
include ('../../component/nav2.php');?>
<script>
    $('input[value=<?php echo $type ?>]').prop('checked',true);
</script>
</body>
</html>

