



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
        <br><br>
        <div class='lesson-parent'>
            <?php
            $message=htmlentities($_GET['message']);
            echo "<div id='message'>$message</div>";
            session_start();
            $me=$_SESSION['mail'];
            if($_SESSION['student']!=true && $_SESSION['coach']!=true){
                echo "<div class='message'><a href='../login'>ログインしてください。</a></div>";
            }
            elseif($_SESSION['student']==true){
                $i=0;
                $stmt=$pdo->query("select * from lessons where student='$me'");
                
                foreach ($stmt as $row){
                    $i++;
                    $id=$row['id'];
                    $coach_name=$row['coach_name'];
                    $coach=$row['coach'];
                    $coach_prof=$row['coach_prof'];
                    $month_date=$row['month_date'];
                    $hour=$row['hour'];
                    $minute=$row['minute'];
                    $util=$row['util'];
                    $locate=$row['locate'];
                    $fee=$row['fee'];
                    $content=$row['content'];
                    $total=$fee*$util/30;
                    $attendance=$row['attendance'];
                    $done=$row['done'];
    
                    echo $charge->amount; // 2000

                    echo ("
                    <div class='lesson-card' id='lesson-card$i'>
                        <span><img src='../../img/$coach_prof' class='chat-icon' alt=''></span>
                        <span class='lesson-name'>$coach_name</span> 
                        <span>@$locate</span>
                        <p>$month_date $hour 時 $minute 分 ~</p>
                        <span>【利用時間】$util 分</span> <span class='lesson-fee'>【料金】$total 円</span><br><br>
                        <div>【教わりたい内容】</div>
                        <p class='ws-pw'>$content</p>
                        ");

                    if ($attendance===0 && $done===0){
                        echo "<button class='cancel-btn' id='cancel-btn$i'>予約キャンセル</button>";
                    }
                    if($attendance===1 && $done===0){
                        echo " <p>予約が確定されました。</p>
                                <form action=\"payment.php\" method=\"post\">
                                    <input type='hidden' name='amount' value='$total'>
                                    <input type='hidden' name='id' value='$id'>
                                    <input class='to-payment-btn' type='submit' value='決済に進む'>
                                </form>
                                ";
                    }
                    if($attendance===1 && $done===1){
                        echo "<div style='color:blue;'>お支払い済み</div>";
                    }
    
                    echo ("    
                    </div>
                    <script>
                        document.getElementById('cancel-btn$i').onclick=function (){
                            var result=window.confirm('$coach_name の予約をキャンセルしてもよろしいですか？');
                            if (result){
                                document.getElementById('lesson-card$i').style.cssText='display:none'
                                $.ajax({
                                    type:\"post\",
                                    url:\"cancel.php\",
                                    dataType:\"json\",
                                    data:{id:'$id',
                                        coach:'$coach'},
                                    done:function (){
                                        console.log(\"done\");
                                        document.getElementById('message').textContent='予約をキャンセルしました。'  
                                    },
                                    fail:function (){
                                        console.log('fail');
                                        document.getElementById('message').textContent='予約をキャンセルに失敗しました。'  
                                    }
                                });
                            }
                        }
                    </script>
                ");
                }
            }
            ?>
        </div>
        <div class='lesson-parent'>
            <?php
            if($_SESSION['coach']==true){
                $stmt=$pdo->query("select * from lessons where coach='$me'");
                foreach ($stmt as $row){
                    $j++;
                    $id2=$row['id'];
                    $student_name=$row['student_name'];
                    $student=$row['student'];
                    $student_prof=$row['student_prof'];
                    $month_date2=$row['month_date'];
                    $hour2=$row['hour'];
                    $minute2=$row['minute'];
                    $util2=$row['util'];
                    $locate2=$row['locate'];
                    $fee2=$row['fee'];
                    $content2=$row['content'];
                    $total2=$fee2*$util2/30;
                    $attendance2=$row['attendance'];
                    $done2=$row['done'];
                    echo ("
                    <div class='lesson-card' id='lesson-card$j'>
                        <span><img src='../../img/$student_prof' class='chat-icon' alt=''></span>
                        <span class='lesson-name'>$student_name</span> 
                        <span>@$locate2</span>
                        <p>$month_date2 $hour2 時 $minute2 分 ~</p>
                        <span>【利用時間】$util2 分</span> <span class='lesson-fee'>【料金】$total2 円</span><br><br>
                        <div>【教わりたい内容】</div>
                        <p class='ws-pw'>$content2</p>
                       
                        ");
                        if ($attendance2===0 && $done2===0){
                            echo "<button class='cancel-btn' id='cancel-btn$j'>予約お断り</button>
                                    <button class='attendance-btn' id='ok-btn$j'>出勤確定</button>";
                        }
                        if($attendance2===1 && $done2===0){
                            echo "<p class='attendanced'>出勤確定済み</p>";
                        }
                        if($attendance2===1 && $done2===1){
                            echo "<p style='color:green;'>お支払い済み</p>";
                        }
                    echo ("
                    </div>
                    <script>
                        document.getElementById('cancel-btn$j').onclick=function (){
                            var result=window.confirm('$student_name さんの予約をお断りしてもよろしいですか？');
                            if (result){
                                document.getElementById('lesson-card$j').style.cssText='display:none';
                                $.ajax({
                                    type:\"post\",
                                    url:\"turn-down.php\",
                                    dataType:\"json\",
                                    data:{id:'$id2',
                                        mail:'$student'},
                                    done:function (){
                                        console.log(\"done\");
                                        document.getElementById('message').textContent='予約を断りました。'  
                                    },
                                    fail:function (){
                                        console.log('fail');
                                        document.getElementById('message').textContent='予約の断りに失敗しました。'  
                                    }
                                });
                            }
                        }
                        document.getElementById('ok-btn$j').onclick=function (){   
                            $.ajax({
                                type:\"post\",
                                url:\"attendance.php\",
                                dataType:\"json\",
                                data:{id:'$id2',
                                    mail:'$student'},
                                done:function (){
                                    console.log(\"done\");
                                    document.getElementById('message').textContent='出勤確定しました。';
                                },
                                fail:function (){
                                    console.log('fail');
                                    document.getElementById('message').textContent='出勤確定に失敗しました。';
                                }
                            });
                            $('#cancel-btn$j').toggle();
                            $('#ok-btn$j').toggle();
                            $('#lesson-card$j').append(\"<p class='attendanced'>出勤確定済み</p>\") ;
                        }
                    </script>
                ");

                }
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
</body>
</html>


